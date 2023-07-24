<?php

namespace Twin\Sdk\Http\Messaging\V1\Entity\TimeRangers;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class TimeRangesItem extends Entity implements Collection
{
    /**
     * @var array<int, string>
     */
    protected array $values;

    public function __construct(array $values)
    {
        $this->assignListProperty('values', $values, 'string');
    }

    /**
     * @return array<int, string>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->values;
    }

    /**
     * @return array<int, string>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->values;
    }

    /**
     * @psalm-return Generator<int, string>
     */
    public function getIterator(): Generator
    {
        yield from $this->values;
    }

    public function count(): int
    {
        return count($this->values);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->values[(int)$offset]);
    }

    public function offsetGet(mixed $offset): string
    {
        return $this->values[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Time list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Time list is read only.');
    }
}
