<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class AttachmentList extends Entity implements Collection
{
    /**
     * @var array<int, AttachmentListItem>
     */
    protected array $attachments;

    public function __construct(array $attachments)
    {
        $this->assignListProperty('attachments', $attachments, AttachmentListItem::class);
    }

    /**
     * @return array<int, AttachmentListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->attachments;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->attachments as $attachment) {
            $values[] = $attachment->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, AttachmentListItem>
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
        return isset($this->attachments[(int)$offset]);
    }

    public function offsetGet(mixed $offset): AttachmentListItem
    {
        return $this->attachments[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Attachment list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Attachment list is read only.');
    }
}