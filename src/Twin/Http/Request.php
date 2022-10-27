<?php

namespace Twin\Http;

use Twin\Entity;

abstract class Request extends Entity
{
    /**
     * @var array<string, string>
     */
    private array $headers = [];

    /**
     * @param array $properties
     * @param array<string|int, string|array{key?: string, castTo?: string}> $propertyMap
     */
    public function __construct(array $properties, array $propertyMap)
    {
        $this->assignProperties($properties, $propertyMap);
    }

    /**
     * @return array<string, string>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    protected function addHeader(string $header, string $value): void
    {
        $this->headers[$header] = $value;
    }
}