<?php

namespace Twin\Sdk\Http\Messaging\V1\Entity\Channel;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class VkAttachmentsMap extends Entity implements Collection
{
    /**
     * @var array<int, string>
     */
    protected array $attachments;

    public function __construct(array $attachments)
    {
        $this->assignMapProperty('attachments', $attachments, 'int', 'string');
    }

    /**
     * @return array<int, string>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->attachments;
    }

    /**
     * @return array<int, string>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->attachments;
    }

    /**
     * @psalm-return Generator<int, string>
     */
    public function getIterator(): Generator
    {
        yield from $this->attachments;
    }

    public function count(): int
    {
        return count($this->attachments);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->attachments[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->attachments[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('VK attachment list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('VK attachment list is read only.');
    }
}
