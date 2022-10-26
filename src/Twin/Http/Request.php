<?php

namespace Twin\Http;

use Twin\Entity;

abstract class Request extends Entity
{
    private array $headers = [];

    public function __construct(array $properties, array $propertyMap)
    {
        $this->assignProperties($properties, $propertyMap);
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    protected function addHeader(string $header, string $value): void
    {
        $this->headers[$header] = $value;
    }
}