<?php

declare(strict_types=1);

namespace Twin\Http;

use Throwable;
use DateTimeImmutable;
use DateTimeInterface;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\Token\RegisteredClaims;
use Lcobucci\JWT\UnencryptedToken;
use Twin\Http\Exception\InvalidResponse;
use Twin\Http\IAM\Response\LoginResponse;

class Authenticator extends HttpClient
{
    private string $email = '';
    private string $password = '';
    private string $authToken = '';
    private string $refreshToken = '';
    private ?DateTimeInterface $tokenExpiredAt = null;
    private int $ttl = 0;
    private int $companyId = 0;
    private array $extra = [];

    public static function fromBasic(
        string $email,
        string $password,
        int $ttl = 3600,
        int $companyId = 0,
        array $extra = []
    ): static {
        $authenticator = new static();
        $authenticator->email = $email;
        $authenticator->password = $password;
        $authenticator->ttl = $ttl;
        $authenticator->companyId = $companyId;
        $authenticator->extra = $extra;
        return $authenticator;
    }

    public static function fromJwt(string $authToken, string $refreshToken, int $ttl = 3600): static
    {
        $authenticator = new static();
        $authenticator->authToken = $authToken;
        $authenticator->refreshToken = $refreshToken;
        $authenticator->ttl = $ttl;
        $authenticator->parseAuthToken();
        return $authenticator;
    }

    final public function __construct()
    {
        parent::__construct('https://iam.twin24.ai/api/v1/auth', $this);
        $this->throwExceptionOnErrorResponse = true;
    }

    public function getAuthToken(bool $refresh = false): string
    {
        if ($this->authToken === '') {
            $this->requestAuthToken();
        } else if ($refresh || $this->tokenExpiredAt <= new DateTimeImmutable()) {
            $this->refresh();
        }
        return $this->authToken;
    }

    private function requestAuthToken(): void
    {
        if ($this->refreshToken !== '') {
            $this->refresh();
        } else {
            $this->login();
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
    }

    private function parseAuthToken(): void
    {
        try {
            /** @var UnencryptedToken $parsedToken */
            $parsedToken = (new Parser(new JoseEncoder()))->parse($this->authToken);
            $this->tokenExpiredAt = $parsedToken->claims()->get(RegisteredClaims::EXPIRATION_TIME);
        } catch (Throwable $e) {
            throw new InvalidResponse('Invalid auth token.', 0, $e);
        }
    }
}