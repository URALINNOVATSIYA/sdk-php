<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogVariableList;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class SystemMap extends Entity implements Collection
{
    /**
     * @var array<string, scalar>
     */
    protected array $system;

    public function __construct(array $system)
    {
        $this->assignMapProperty('system', $system, 'string', 'mixed');
    }

    /**
     * @return array<string, scalar>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->system;
    }

    /**
     * @return array<string, scalar>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->system;
    }

    /**
     * @psalm-return Generator<string, scalar>
     */
    public function getIterator(): Generator
    {
        yield from $this->system;
    }

    public function count(): int
    {
        return count($this->system);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->system[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->system[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Context list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Context list is read only.');
    }
}