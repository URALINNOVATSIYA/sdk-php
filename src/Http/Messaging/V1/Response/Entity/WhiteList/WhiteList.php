<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\WhiteList;

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
    protected array $whiteList;

    public function __construct(array $whiteList)
    {
        $this->assignListProperty('whiteList', $whiteList, WhiteListItem::class);
    }

    /**
     * @return array<int, WhiteListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->whiteList;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->whiteList as $val) {
            $values[] = $val->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, WhiteListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->whiteList;
    }

    public function count(): int
    {
        return count($this->whiteList);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->whiteList[(int)$offset]);
    }

    public function offsetGet(mixed $offset): WhiteListItem
    {
        return $this->whiteList[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('White list item is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('White list item is read only.');
    }
}
