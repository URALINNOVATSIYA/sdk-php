<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Bandwidth;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class BandwidthList extends Entity implements Collection
{
    /**
     * @var array<int, BandwidthListItem>
     */
    protected array $values;

    public function __construct(array $values)
    {
        $this->assignListProperty('values', $values, BandwidthListItem::class);
    }

    /**
     * @return array<int, BandwidthListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->values;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->values as $val) {
            $values[] = $val->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, BandwidthListItem>
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

    public function offsetGet(mixed $offset): BandwidthListItem
    {
        return $this->values[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Bandwidth link list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Bandwidth list is read only.');
    }
}
