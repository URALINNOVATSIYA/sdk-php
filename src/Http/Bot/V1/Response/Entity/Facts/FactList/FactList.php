<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Facts\FactList;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class FactList extends Entity implements Collection
{
    /**
     * @var array<int, FactListItem>
     */
    protected array $facts;

    public function __construct(array $facts)
    {
        $this->assignListProperty('facts', $facts, FactListItem::class);
    }

    /**
     * @return array<int, FactListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->facts;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->facts as $fact) {
            $values[] = $fact->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, FactListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->facts;
    }

    public function count(): int
    {
        return count($this->facts);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->facts[(int)$offset]);
    }

    public function offsetGet(mixed $offset): FactListItem
    {
        return $this->facts[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Fact list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Fact list is read only.');
    }
}