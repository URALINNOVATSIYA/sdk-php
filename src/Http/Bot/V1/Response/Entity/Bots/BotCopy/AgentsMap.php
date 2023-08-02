<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotCopy;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class AgentsMap extends Entity implements Collection
{
    /**
     * @var array<string, scalar>
     */
    protected array $agents;

    public function __construct(array $agents)
    {
        $this->assignMapProperty('agents', $agents, 'string', '?string');
    }

    /**
     * @return array<string, scalar>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->agents;
    }

    /**
     * @return array<string, scalar>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->agents;
    }

    /**
     * @psalm-return Generator<string, scalar>
     */
    public function getIterator(): Generator
    {
        yield from $this->agents;
    }

    public function count(): int
    {
        return count($this->agents);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->agents[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->agents[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Agents list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Agents list is read only.');
    }
}