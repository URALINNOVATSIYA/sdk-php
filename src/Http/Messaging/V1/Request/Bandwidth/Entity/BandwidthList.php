<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Bandwidth\Entity;

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
    protected array $items;

    public function __construct(array $items)
    {
        $this->assignListProperty('items', $items, BandwidthListItem::class);
    }

    /**
     * @return array<int, BandwidthListItem>
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
     * @psalm-return Generator<int, BandwidthListItem>
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

    public function offsetGet(mixed $offset): BandwidthListItem
    {
        return $this->items[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Bandwidth list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Bandwidth list is read only.');
    }
}
