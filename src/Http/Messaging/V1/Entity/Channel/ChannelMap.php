<?php

namespace Twin\Sdk\Http\Messaging\V1\Entity\Channel;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class ChannelMap extends Entity implements Collection
{
    /**
     * @var array<string, ChannelItemList>
     */
    protected array $channelType;

    public function __construct(array $channelType)
    {
        $this->assignMapProperty('channelType', $channelType, 'string', ChannelItemList::class);
    }

    /**
     * @return array<string, ChannelItemList>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->channelType;
    }

    /**
     * @return array<string, ChannelItemList>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->channelType;
    }

    /**
     * @psalm-return Generator<string, ChannelItemList>
     */
    public function getIterator(): Generator
    {
        yield from $this->channelType;
    }

    public function count(): int
    {
        return count($this->channelType);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->channelType[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool|ChannelItemList
    {
        return $this->channelType[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Channel type list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Channel type list is read only.');
    }
}
