<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Sender\Entity;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class SenderList extends Entity implements Collection
{
    /**
     * @var array<int, SenderListItem>
     */
    protected array $senders;

    public function __construct(array $senders)
    {
        $this->assignListProperty('senders', $senders, SenderListItem::class);
    }

    /**
     * @return array<int, SenderListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->senders;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->senders as $sender) {
            $values[] = $sender->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, SenderListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->senders;
    }

    public function count(): int
    {
        return count($this->senders);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->senders[(int)$offset]);
    }

    public function offsetGet(mixed $offset): SenderListItem
    {
        return $this->senders[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Sender list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Sender list is read only.');
    }
}
