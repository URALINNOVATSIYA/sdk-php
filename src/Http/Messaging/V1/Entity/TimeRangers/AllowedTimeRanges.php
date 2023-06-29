<?php

namespace Twin\Sdk\Http\Messaging\V1\Entity\TimeRangers;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class AllowedTimeRanges extends Entity implements Collection
{
    /**
     * @var array<int, TimeRangesItem>
     */
    protected array $items;

    public function __construct(array $items)
    {
        $this->assignListProperty('items', $items, TimeRangesItem::class);
    }

    /**
     * @return array<int, TimeRangesItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->items;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->items as $item) {
            $values[] = $item->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, TimeRangesItem>
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
        return isset($this->items[(int)$offset]);
    }

    public function offsetGet(mixed $offset): TimeRangesItem
    {
        return $this->items[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Allowed time ranges list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Allowed time ranges list is read only.');
    }
}
