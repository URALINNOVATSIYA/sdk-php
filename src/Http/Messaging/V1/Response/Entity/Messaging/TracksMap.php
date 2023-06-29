<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class TracksMap extends Entity implements Collection
{
    /**
     * @var array<string, scalar>
     */
    protected array $tracks;

    public function __construct(array $tracks)
    {
        $this->assignMapProperty('tracks', $tracks, 'string', 'scalar');
    }

    /**
     * @return array<string, scalar>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->tracks;
    }

    /**
     * @return array<string, scalar>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->tracks;
    }

    /**
     * @psalm-return Generator<string, scalar>
     */
    public function getIterator(): Generator
    {
        yield from $this->tracks;
    }

    public function count(): int
    {
        return count($this->tracks);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->tracks[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->tracks[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Track list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Track list is read only.');
    }
}
