<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class ActionMap extends Entity implements Collection
{
    /**
     * @var array<string, scalar>
     */
    protected array $actions;

    public function __construct(array $actions)
    {
        $this->assignMapProperty('actions', $actions, 'string', 'string');
    }

    /**
     * @return array<string, scalar>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->actions;
    }

    /**
     * @return array<string, scalar>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->actions;
    }

    /**
     * @psalm-return Generator<string, scalar>
     */
    public function getIterator(): Generator
    {
        yield from $this->actions;
    }

    public function count(): int
    {
        return count($this->actions);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->actions[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->actions[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Action is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Action is read only.');
    }
}