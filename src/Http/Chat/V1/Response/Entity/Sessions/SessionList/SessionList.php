<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\SessionList;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class SessionList extends Entity implements Collection
{
    /**
    * @var array<int, SessionListItem>
    */
    protected array $sessions;

    public function __construct(array $sessions)
    {
        $this->assignListProperty('sessions', $sessions, SessionListItem::class);
    }

    /**
     * @return array<int, SessionListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->sessions;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->sessions as $session) {
            $values[] = $session->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, SessionListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->sessions;
    }

    public function count(): int
    {
        return count($this->sessions);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->sessions[(int)$offset]);
    }

    public function offsetGet(mixed $offset): SessionListItem
    {
        return $this->sessions[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Session list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Session list is read only.');
    }
}