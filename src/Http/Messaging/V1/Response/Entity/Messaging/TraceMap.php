<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class TraceMap extends Entity implements Collection
{
    /**
     * @var array<int, string>
     */
    protected array $trace;

    public function __construct(array $trace)
    {
        $this->assignMapProperty('trace', $trace, 'int', 'string');
    }

    /**
     * @return array<int, string>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->trace;
    }

    /**
     * @return array<int, string>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->trace;
    }

    /**
     * @psalm-return Generator<int, string>
     */
    public function getIterator(): Generator
    {
        yield from $this->trace;
    }

    public function count(): int
    {
        return count($this->trace);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->trace[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->trace[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Trace list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Trace list is read only.');
    }
}
