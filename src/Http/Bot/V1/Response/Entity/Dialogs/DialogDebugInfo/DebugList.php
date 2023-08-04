<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogDebugInfo;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class DebugList extends Entity implements Collection
{
    /**
     * @var array<int, DebugListItem>
     */
    protected array $items;

    public function __construct(array $items)
    {
        $this->assignListProperty('items', $items, DebugListItem::class);
    }

    /**
     * @return array<int, DebugListItem>
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
     * @psalm-return Generator<int, DebugListItem>
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

    public function offsetGet(mixed $offset): DebugListItem
    {
        return $this->items[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Debug Item list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Debug Item list is read only.');
    }
}