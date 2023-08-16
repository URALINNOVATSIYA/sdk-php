<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class OperatorList extends Entity implements Collection
{
    /**
     * @var array<int, OperatorListItem>
     */
    protected array $operators;

    public function __construct(array $operators)
    {
        $this->assignListProperty('operators', $operators, OperatorListItem::class);
    }

    /**
     * @return array<int, SessionListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->operators;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->operators as $operator) {
            $values[] = $operator->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, OperatorListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->operators;
    }

    public function count(): int
    {
        return count($this->operators);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->operators[(int)$offset]);
    }

    public function offsetGet(mixed $offset): OperatorListItem
    {
        return $this->operators[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Operator list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Operator list is read only.');
    }
}