<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\ShortLink;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class ShortLinkList extends Entity implements Collection
{
    /**
     * @var array<int, ShortLinkListItem>
     */
    protected array $shortLinks;

    public function __construct(array $shortLinks)
    {
        $this->assignListProperty('shortLinks', $shortLinks, ShortLinkListItem::class);
    }

    /**
     * @return array<int, ShortLinkListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->shortLinks;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->shortLinks as $shortLink) {
            $values[] = $shortLink->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, ShortLinkListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->shortLinks;
    }

    public function count(): int
    {
        return count($this->shortLinks);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->shortLinks[(int)$offset]);
    }

    public function offsetGet(mixed $offset): ShortLinkListItem
    {
        return $this->shortLinks[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Short link list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Short link list is read only.');
    }
}
