<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotList;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class BotList extends Entity implements Collection
{
    /**
     * @var array<int, BotListItem>
     */
    protected array $bots;

    public function __construct(array $bots)
    {
        $this->assignListProperty('bots', $bots, BotListItem::class);
    }

    /**
     * @return array<int, BotListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->bots;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->bots as $bot) {
            $values[] = $bot->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, BotListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->bots;
    }

    public function count(): int
    {
        return count($this->bots);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->bots[(int)$offset]);
    }

    public function offsetGet(mixed $offset): BotListItem
    {
        return $this->bots[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Bot list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Bot list is read only.');
    }
}