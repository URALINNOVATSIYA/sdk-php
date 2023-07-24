<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\CheckPhones;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class PhonesResultMap extends Entity implements Collection
{
    /**
     * @var array<int, ResultList>
     */
    protected array $result;

    public function __construct(array $result)
    {
        $this->assignMapProperty('result', $result, 'int', ResultList::class);
    }

    /**
     * @return array<int, ResultList>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->result;
    }

    /**
     * @return array<int, ResultList>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->result;
    }

    /**
     * @psalm-return Generator<int, ResultList>
     */
    public function getIterator(): Generator
    {
        yield from $this->result;
    }

    public function count(): int
    {
        return count($this->result);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->result[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool|ResultList
    {
        return $this->result[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Result list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Result list is read only.');
    }
}
