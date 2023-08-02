<?php

declare(strict_types=1);

namespace Twin\Sdk\Http;

use Throwable;
use OutOfBoundsException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\StreamInterface;
use GuzzleHttp\Promise\FulfilledPromise;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client;
use Twin\Sdk\Http\Exception\BadRequest;
use Twin\Sdk\Http\Exception\Forbidden;
use Twin\Sdk\Http\Exception\HttpException;
use Twin\Sdk\Http\Exception\MethodNotAllowed;
use Twin\Sdk\Http\Exception\NotFound;
use Twin\Sdk\Http\Exception\Unauthorized;
use Twin\Sdk\Http\Exception\UnprocessableEntity;

abstract class HttpClient
{
    /**
     * @var int Max request execution time
     */
    private int $requestTimeout = 60;

    /**
     * @var int Max server connection time
     */
    private int $connectionTimeout = 5;

    /**
     * @var string Default content type of any server request
     */
    private string $defaultContentType = 'application/json';

    /**
     * @var string The base API URL of a Twin service on production
     */
    private string $prodApiBaseUrl;

    /**
     * @var string The base API URL of a Twin service on development
     */
    private string $devApiBaseUrl;

    private bool $async = false;

    private bool $test = false;

    private bool $throwExceptionOnRequestError = true;

    private bool $throwExceptionOnErrorResponse = false;

    private Authenticator $authenticator;

    private ClientInterface $client;

    public function __construct(
        string $prodApiBaseUrl,
        string $devApiBaseUrl,
        Authenticator $authenticator,
        ClientInterface $client = null,
    ) {
        $this->prodApiBaseUrl = $prodApiBaseUrl;
        $this->devApiBaseUrl = $devApiBaseUrl;
        $this->authenticator = $authenticator;
        $this->client = $client ?? new Client();
    }

    public function testOn(): static
    {
        if (!$this->test) {
            $this->test = true;
            $this->authenticator->testOn();
        }
        return $this;
    }

    public function testOff(): static
    {
        if ($this->test) {
            $this->test = false;
            $this->authenticator->testOff();
        }
        return $this;
    }

    public function test(bool $flag): static
    {
        if ($this->test !== $flag) {
            $this->test = $flag;
            $this->authenticator->test($flag);
        }
        return $this;
    }

    public function asyncOn(): static
    {
        $this->async = true;
        return $this;
    }

    public function asyncOff(): static
    {
        $this->async = false;
        return $this;
    }

    public function async(bool $flag): static
    {
        $this->async = $flag;
        return $this;
    }

    public function throwExceptionOnRequestError(bool $flag): static
    {
        $this->throwExceptionOnRequestError = $flag;
        return $this;
    }

    public function throwExceptionOnErrorResponse(bool $flag): static
    {
        $this->throwExceptionOnErrorResponse = $flag;
        return $this;
    }

    public function setConnectionTimeout(int $timeout): static
    {
        $this->connectionTimeout = $timeout;
        return $this;
    }

    public function getConnectionTimeout(): int
    {
        return $this->connectionTimeout;
    }

    public function setRequestTimeout(int $timeout): static
    {
        $this->requestTimeout = $timeout;
        return $this;
    }

    public function getRequestTimeout(): int
    {
        return $this->requestTimeout;
    }

    /**
     * @template T of Response
     * @param string $method
     * @param string $url
     * @param class-string<T> $responseClass
     * @param bool $requireAuthorization
     * @param array $params
     * @param array<string, string> $headers
     * @param array<string, mixed> $options
     * @return T|PromiseInterface
     * @throws Throwable
     */
    protected function request(
        string $method,
        string $url,
        string $responseClass,
        bool $requireAuthorization = false,
        array $params = [],
        array $headers = [],
        array $options = []
    ): Response|PromiseInterface {
        if ($this->async) {
            return $this->requestAsync($method, $url, $responseClass, $requireAuthorization, $params, $headers, $options);
        }
        return $this->requestSync($method, $url, $responseClass, $requireAuthorization, $params, $headers, $options);
    }

    /**
     * @template T of Response
     * @param string $method
     * @param string $url
     * @param class-string<T> $responseClass
     * @param bool $requireAuthorization
     * @param array $params
     * @param array<string, string> $headers
     * @param array<string, mixed> $options
     * @return T
     * @throws Throwable
     */
    protected function requestSync(
        string $method,
        string $url,
        string $responseClass,
        bool $requireAuthorization = false,
        array $params = [],
        array $headers = [],
        array $options = []
    ): Response {
        $url = $this->prepareUrl($url);
        /** @var array{headers: array<string, string>} $options */
        $options = array_merge($this->getRequestOptions($method, $url, $params, $headers), $options);

        if ($requireAuthorization && $response = $this->addAuthToken($options['headers'], $responseClass)) {
            return $response;
        }

        while (true) {
            try {
                $response = $this->client->request($method, $url, $options);
            } catch (Throwable $e) {
                return $this->processRequestException($responseClass, $e);
            }
            if (null !== $response = $this->processResponse($responseClass, $response)) {
                return $response;
            }
            if ($response = $this->addAuthToken($options['headers'], $responseClass)) {
                return $response;
            }
        }
    }

    /**
     * @template T of Response
     * @param string $method
     * @param string $url
     * @param class-string<T> $responseClass
     * @param bool $requireAuthorization
     * @param array $params
     * @param array<string, string> $headers
     * @param array<string, mixed> $options
     * @return PromiseInterface
     * @throws Throwable
     */
    protected function requestAsync(
        string $method,
        string $url,
        string $responseClass,
        bool $requireAuthorization = false,
        array $params = [],
        array $headers = [],
        array $options = []
    ): PromiseInterface {
        $onFulfilled = function (ResponseInterface $response) use (
            $method,
            $url,
            $responseClass,
            $params,
            $headers,
            $options
        ): Response {
            $response = $this->processResponse($responseClass, $response);
            if ($response !== null) {
                return $response;
            }
            if ($response = $this->addAuthToken($headers, $responseClass)) {
                return $response;
            }
            return $this->requestSync($method, $url, $responseClass, false, $params, $headers, $options);
        };

        $onReject = function (RequestException|ConnectException $e) use ($onFulfilled, $responseClass): Response {
            if ($e instanceof RequestException) {
                $response = $e->getResponse();
            } else {
                $response = null;
            }
            if ($response === null) {
                return $this->processRequestException($responseClass, $e);
            }
            return $onFulfilled($response);
        };

        if ($requireAuthorization && $response = $this->addAuthToken($headers, $responseClass)) {
            return new FulfilledPromise($response);
        }

        return $this->client
            ->requestAsync(
                $method,
                $this->prepareUrl($url),
                array_merge($this->getRequestOptions($method, $url, $params, $headers), $options)
            )
            ->then($onFulfilled, $onReject);
    }

    /**
     * @template T of Response
     * @param array<string, string> $headers
     * @param class-string<T> $responseClass
     * @return T|null
     * @throws Throwable
     */
    protected function addAuthToken(array &$headers, string $responseClass): ?Response
    {
        try {
            $headers['Authorization'] = 'Bearer ' . $this->authenticator->getAuthToken(true);
        } catch (Throwable $e) {
            if ($this->throwExceptionOnErrorResponse) {
                throw $e;
            }
            return new $responseClass(0, [], '', null, $e->getMessage(), [], $e);
        }
        return null;
    }

    private function prepareUrl(string $url): string
    {
        $prefix = $this->test ? $this->devApiBaseUrl : $this->prodApiBaseUrl;
        if ($prefix === '') {
            return $url;
        }
        if ($url === '') {
            return $prefix;
        }
        return rtrim($prefix, '/') . '/' . ltrim($url, '/');
    }

    /**
     * @param ResponseInterface $response
     * @return array<string, string>
     */
    private function normalizeResponseHeaders(ResponseInterface $response): array
    {
        $headers = [];
        foreach ($response->getHeaders() as $header => $values) {
            $headers[strtolower((string)$header)] = implode(';', $values);
        }
        return $headers;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $params
     * @param array<string, string> $headers
     * @return array<string, mixed>
     */
    private function getRequestOptions(string $method, string $url, array $params, array $headers = []): array
    {
        $this->addDefaultContentTypeHeader($headers);

        $paramsKey = $this->getKeyOfParamsOption($method, $headers);
        if ($method === 'GET') {
            $params = array_merge($params, $this->extractQueryParams($url));
        }
        if ($paramsKey === RequestOptions::MULTIPART) {
            unset($headers['Content-Type']);
        }

        return  [
            'http_errors' => false,
            'connect_timeout' => $this->connectionTimeout,
            'timeout' => $this->requestTimeout,
            'headers' => $headers,
            $paramsKey => $params,
        ];
    }

    /**
     * @param array<string, string> $headers
     * @return void
     */
    private function addDefaultContentTypeHeader(array &$headers): void
    {
        if (empty($headers['Content-Type'])) {
            $headers['Content-Type'] = $this->defaultContentType;
        }
    }

    /**
     * @param string $method
     * @param array<string, string> $headers
     * @return string
     */
    private function getKeyOfParamsOption(string $method, array $headers): string
    {
        if ($method === 'GET') {
            return RequestOptions::QUERY;
        }
        $contentType = strtolower($headers['Content-Type']);
        if ($contentType === 'application/json') {
            return RequestOptions::JSON;
        }
        if ($contentType === 'multipart/form-data') {
            return RequestOptions::MULTIPART;
        }
        if ($contentType === 'application/x-www-form-urlencoded') {
            return RequestOptions::FORM_PARAMS;
        }
        throw new OutOfBoundsException("Content type \"$contentType\" is not supported.");
    }

    private function extractQueryParams(string $url): array
    {
        parse_str((string)parse_url($url, PHP_URL_QUERY), $params);
        return $params;
    }

    /**
     * @template T of Response
     * @param class-string<T> $responseClass
     * @param Throwable $e
     * @return T
     * @throws Throwable
     */
    private function processRequestException(string $responseClass, Throwable $e): Response
    {
        if ($this->throwExceptionOnRequestError) {
            throw $e;
        }
        return new $responseClass(0, [], '', null, '', [], $e);
    }

    /**
     * @template T of Response
     * @param class-string<T> $responseClass
     * @param ResponseInterface $response
     * @return T|null
     */
    private function processResponse(string $responseClass, ResponseInterface $response): ?Response
    {
        $responseStatusCode = $response->getStatusCode();
        $responseHeaders = $this->normalizeResponseHeaders($response);
        [$response, $rawResponse] = $this->parseResponse($response->getBody(), $responseHeaders);

        if ($responseStatusCode >= 400) {
            if (is_array($response)) {
                $error = $response['error'] ?? '';
                $errorDetails = $response['details'] ?? null;
            } else {
                $error = $rawResponse;
                $errorDetails = null;
            }
            $response = null;
            if ($responseStatusCode === 401 && $error === 'Token is expired.') {
                return null;
            }
            if ($this->throwExceptionOnErrorResponse) {
                $error = is_scalar($error) ? (string)$error : json_encode($error);
                $this->throwException($error, $responseStatusCode);
            }
        } else {
            $error = '';
            $errorDetails = [];
        }

        try {
            return new $responseClass(
                $responseStatusCode,
                $responseHeaders,
                $rawResponse,
                $response,
                $error,
                $errorDetails,
                null
            );
        } catch (Throwable $e) {
            return new $responseClass(
                $responseStatusCode,
                $responseHeaders,
                $rawResponse,
                null,
                $e->getMessage(),
                $errorDetails,
                $e
            );
        }
    }

    /**
     * @param StreamInterface $response
     * @param array<string, string> $responseHeaders
     * @return array{mixed, string}
     */
    private function parseResponse(StreamInterface $response, array $responseHeaders): array
    {
        if (str_starts_with($responseHeaders['content-disposition'] ?? '', 'attachment')) {
            return [$response, ''];
        }
        $response = $response->getContents();
        $contentType = $responseHeaders['content-type'] ?? '';
        if ($contentType !== '') {
            $contentType = explode(';', $contentType)[0];
            if ($contentType === 'application/json' || str_ends_with($contentType, 'json')) {
                return [json_decode($response, true) ?? $response, $response];
            }
        }
        return [$response, $response];
    }

    private function throwException(string $error, int $statusCode): void
    {
        $error = "Error response: $error";
        throw match ($statusCode) {
            400 => new BadRequest($error),
            401 => new Unauthorized($error),
            403 => new Forbidden($error),
            404 => new NotFound($error),
            405 => new MethodNotAllowed($error),
            422 => new UnprocessableEntity($error),
            default => new HttpException($statusCode, $error),
        };
    }
}
