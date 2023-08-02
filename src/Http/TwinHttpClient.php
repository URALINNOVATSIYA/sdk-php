<?php

namespace Twin\Sdk\Http;

use RuntimeException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\IAM\V1\IamHttpClient;
use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;

/**
 * @property-read IamHttpClient $iam
 * @property-read MessagingHttpClient $messaging
 * @property-read BotHttpClient $bot
 */
class TwinHttpClient
{
    /**
     * @var HttpClient[]
     */
    private array $clients = [];

    final public function __construct(Authenticator $authenticator, ClientInterface $client = null)
    {
        $this->registerClients($authenticator, $client ?? new Client());
    }

    protected function registerClients(Authenticator $authenticator, ClientInterface $client): void
    {
        $this->registerIamClient($authenticator, $client);
        $this->registerMessagingClient($authenticator, $client);
        $this->registerBotClient($authenticator, $client);
    }

    protected function registerIamClient(Authenticator $authenticator, ClientInterface $client): void
    {
        $this->registerClient('iam', new IamHttpClient($authenticator, $client));
    }

    protected function registerMessagingClient(Authenticator $authenticator, ClientInterface $client): void
    {
        $this->registerClient('messaging', new MessagingHttpClient($authenticator, $client));
    }

    protected function registerBotClient(Authenticator $authenticator, ClientInterface $client): void
    {
        $this->registerClient('bot', new BotHttpClient($authenticator, $client));
    }

    final protected function registerClient(string $service, HttpClient $client): void
    {
        $this->clients[$service] = $client;
    }

    public function __get(string $service): HttpClient
    {
        if (isset($this->clients[$service])) {
            return $this->clients[$service];
        }
        throw new RuntimeException("Property \"$service\" does not exist.");
    }

    public function testOn(): static
    {
        foreach ($this->clients as $client) {
            $client->testOn();
        }
        return $this;
    }

    public function testOff(): static
    {
        foreach ($this->clients as $client) {
            $client->testOff();
        }
        return $this;
    }

    public function test(bool $flag): static
    {
        foreach ($this->clients as $client) {
            $client->test($flag);
        }
        return $this;
    }

    public function asyncOn(): static
    {
        foreach ($this->clients as $client) {
            $client->asyncOn();
        }
        return $this;
    }

    public function asyncOff(): static
    {
        foreach ($this->clients as $client) {
            $client->asyncOff();
        }
        return $this;
    }

    public function async(bool $flag): static
    {
        foreach ($this->clients as $client) {
            $client->async($flag);
        }
        return $this;
    }

    public function throwExceptionOnRequestError(bool $flag): static
    {
        foreach ($this->clients as $client) {
            $client->throwExceptionOnRequestError($flag);
        }
        return $this;
    }

    public function throwExceptionOnErrorResponse(bool $flag): static
    {
        foreach ($this->clients as $client) {
            $client->throwExceptionOnErrorResponse($flag);
        }
        return $this;
    }

    public function setConnectionTimeout(int $timeout): static
    {
        foreach ($this->clients as $client) {
            $client->setConnectionTimeout($timeout);
        }
        return $this;
    }

    public function getConnectionTimeout(): int
    {
        return current($this->clients)->getConnectionTimeout();
    }

    public function setRequestTimeout(int $timeout): static
    {
        foreach ($this->clients as $client) {
            $client->setRequestTimeout($timeout);
        }
        return $this;
    }

    public function getRequestTimeout(): int
    {
        return current($this->clients)->getRequestTimeout();
    }
}