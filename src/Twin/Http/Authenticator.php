<?php

declare(strict_types=1);

namespace Twin\Http;

use DateTimeImmutable;
use GuzzleHttp\ClientInterface;
use Twin\Http\Exception\InvalidResponse;
use Twin\Http\IAM\V1\Response\LoginResponse;

final class Authenticator extends HttpClient
{
    private string $email = '';
    private string $password = '';
    private string $authToken = '';
    private string $refreshToken = '';
    private ?DateTimeImmutable $tokenExpiredAt = null;
    private int $ttl = 0;
    private int $companyId = 0;
    private array $extra = [];
    private mixed $tokenRefreshCallback = null;

    public static function fromBasic(
        string $email,
        string $password,
        int $ttl = 3600,
        int $companyId = 0,
        array $extra = [],
        ClientInterface $client = null
    ): self {
        $authenticator = new self($client);
        $authenticator->email = $email;
        $authenticator->password = $password;
        $authenticator->ttl = $ttl;
        $authenticator->companyId = $companyId;
        $authenticator->extra = $extra;
        return $authenticator;
    }

    public static function fromJwt(
        string $authToken,
        string $refreshToken,
        int $ttl = 3600,
        ClientInterface $client = null
    ): self {
        $authenticator = new self($client);
        $authenticator->authToken = $authToken;
        $authenticator->refreshToken = $refreshToken;
        $authenticator->ttl = $ttl;
        $authenticator->parseAuthToken();
        return $authenticator;
    }

    private function __construct(?ClientInterface $client)
    {
        parent::__construct('https://iam.twin24.ai/api/v1/auth', $this, $client);
        $this->throwExceptionOnRequestError(true);
        $this->throwExceptionOnErrorResponse(true);
    }

    public function onTokenRefresh(callable $callback): void
    {
        $this->tokenRefreshCallback = $callback;
    }

    public function getTokenExpiration(): ?DateTimeImmutable
    {
        return $this->tokenExpiredAt;
    }

    public function getRefreshToken(bool $refresh = false): string
    {
        $this->requestAuthToken($refresh);
        return $this->refreshToken;
    }

    public function getAuthToken(bool $refresh = false): string
    {
        $this->requestAuthToken($refresh);
        return $this->authToken;
    }

    private function requestAuthToken(bool $refresh): void
    {
        if ($this->authToken === '' || $this->refreshToken === '') {
            $this->login();
        } else if ($refresh || $this->tokenExpiredAt <= new DateTimeImmutable()) {
            $this->refresh();
        }
    }

    private function login(): void
    {
        $response = $this->requestSync(
            'POST',
            'login',
            LoginResponse::class,
            false,
            [
                'email' => $this->email,
                'password' => $this->password,
                'ttl' => $this->ttl,
                'companyId' => $this->companyId ?: null,
                'extra' => $this->extra
            ]
        );
        $this->extractToken($response);
    }

    private function refresh(): void
    {
        $response = $this->requestSync(
            'GET',
            'refresh',
            LoginResponse::class,
            false,
            [
                'refreshToken' => $this->refreshToken,
                'ttl' => $this->ttl
            ],
            [
                'Authorization' => $this->authToken
            ]
        );
        $this->extractToken($response);
    }

    private function extractToken(LoginResponse $response): void
    {
        $this->refreshToken = $response->body->refreshToken;
        $this->authToken = $response->body->authToken;
        $this->parseAuthToken();
        if ($this->tokenRefreshCallback) {
            ($this->tokenRefreshCallback)($this->authToken, $this->refreshToken, $this->tokenExpiredAt);
        }
    }

    private function parseAuthToken(): void
    {
        if ($this->authToken === '') {
            $this->tokenExpiredAt = new DateTimeImmutable();
            return;
        }
        $data = explode('.', $this->authToken);
        if (count($data) === 3) {
            $data = $data[1];
            $data = strtr($data, '-_', '+/');
            $data = base64_decode($data, true);
            if ($data !== false) {
                $data = json_decode($data, true);
                if (is_array($data) && isset($data['exp'])) {
                    $exp = $data['exp'];
                    if (is_numeric($exp)) {
                        $exp = number_format((float)$exp, 6, '.', '');
                        $exp = DateTimeImmutable::createFromFormat('U.u', $exp);
                        if ($exp) {
                            $this->tokenExpiredAt = $exp;
                            return;
                        }
                    }
                }
            }
        }
        throw new InvalidResponse('Invalid auth token.');
    }
}