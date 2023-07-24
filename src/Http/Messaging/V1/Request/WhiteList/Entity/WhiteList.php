<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\WhiteList\Entity;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class WhiteList extends Entity implements Collection
{
    /**
     * @var array<int, WhiteListItem>
     */
    protected array $items;

    public function __construct(array $items)
    {
        $this->assignListProperty('items', $items, WhiteListItem::class);
    }

    /**
     * @return array<int, WhiteListItem>
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
     * @psalm-return Generator<int, WhiteListItem>
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

    public function offsetGet(mixed $offset): WhiteListItem
    {
        return $this->items[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('White list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('White list is read only.');
    }
}
