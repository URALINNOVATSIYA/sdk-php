<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class ClientMetadataMap extends Entity implements Collection
{
    /**
     * @var array<string, scalar>
     */
    protected array $items;

    public function __construct(array $items)
    {
        $this->assignMapProperty('items', $items, 'string', 'string');
    }

    /**
     * @return array<string, scalar>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->items;
    }

    /**
     * @return array<string, scalar>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->items;
    }

    /**
     * @psalm-return Generator<string, scalar>
     */
    public function getIterator(): Generator
    {
        yield from $this->items;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->items[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Client Metadata is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Client Metadata is read only.');
    }
}