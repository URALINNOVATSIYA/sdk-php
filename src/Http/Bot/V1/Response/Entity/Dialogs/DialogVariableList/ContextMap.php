<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogVariableList;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class ContextMap extends Entity implements Collection
{
    /**
     * @var array<string, scalar>
     */
    protected array $context;

    public function __construct(array $context)
    {
        $this->assignMapProperty('context', $context, 'string', '?string|int|bool');
    }

    /**
     * @return array<string, scalar>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->context;
    }

    /**
     * @return array<string, scalar>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->context;
    }

    /**
     * @psalm-return Generator<string, scalar>
     */
    public function getIterator(): Generator
    {
        yield from $this->context;
    }

    public function count(): int
    {
        return count($this->context);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->context[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->context[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
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