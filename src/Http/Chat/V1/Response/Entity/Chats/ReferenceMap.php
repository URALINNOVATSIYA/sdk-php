<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Chats;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class ReferenceMap extends Entity implements Collection
{
    /**
     * @var array<string, scalar>
     */
    protected array $reference;

    public function __construct(array $reference)
    {
        $this->assignMapProperty('reference', $reference, 'string', '?string');
    }

    /**
     * @return array<string, scalar>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->reference;
    }

    /**
     * @return array<string, scalar>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->reference;
    }

    /**
     * @psalm-return Generator<string, scalar>
     */
    public function getIterator(): Generator
    {
        yield from $this->reference;
    }

    public function count(): int
    {
        return count($this->reference);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->reference[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->reference[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Reference list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Reference list is read only.');
    }
}