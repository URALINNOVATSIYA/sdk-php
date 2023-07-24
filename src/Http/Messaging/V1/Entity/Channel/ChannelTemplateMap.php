<?php

namespace Twin\Sdk\Http\Messaging\V1\Entity\Channel;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class ChannelTemplateMap extends Entity implements Collection
{
    /**
     * @var array<string|int, scalar|TemplateMap>
     */
    protected array $data;

    public function __construct(array $data)
    {
        $this->assignMapProperty('data', $data, 'string|int', 'scalar|' . TemplateMap::class);
    }

    /**
     * @return array<string|int, scalar|TemplateMap>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->data;
    }

    /**
     * @return array<string|int, scalar|TemplateMap>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->data;
    }

    /**
     * @psalm-return Generator<string|int, scalar|TemplateMap>
     */
    public function getIterator(): Generator
    {
        yield from $this->data;
    }

    public function count(): int
    {
        return count($this->data);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->data[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool|TemplateMap
    {
        return $this->data[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Template data list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Template data list is read only.');
    }
}
