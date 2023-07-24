<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Messaging\Entity;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;
use Twin\Sdk\Http\Messaging\V1\Entity\Channel\Destination;

class DestinationList extends Entity implements Collection
{
    /**
     * @var array<int, Destination>
     */
    protected array $destinations;

    public function __construct(array $destinations)
    {
        $this->assignListProperty('destinations', $destinations, Destination::class);
    }

    /**
     * @return array<int, Destination>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->destinations;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->destinations as $destination) {
            $values[] = $destination->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, Destination>
     */
    public function getIterator(): Generator
    {
        yield from $this->destinations;
    }

    public function count(): int
    {
        return count($this->destinations);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->destinations[(int)$offset]);
    }

    public function offsetGet(mixed $offset): Destination
    {
        return $this->destinations[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Destination list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Destination list is read only.');
    }
}
