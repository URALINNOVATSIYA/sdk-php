<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ChatList;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class ChatList extends Entity implements Collection
{
    /**
     * @var array<int, ChatListItem>
     */
    protected array $chats;

    public function __construct(array $chats)
    {
        $this->assignListProperty('chats', $chats, ChatListItem::class);
    }

    /**
     * @return array<int, ChatListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->chats;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->chats as $chat) {
            $values[] = $chat->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, ChatListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->chats;
    }

    public function count(): int
    {
        return count($this->chats);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->chats[(int)$offset]);
    }

    public function offsetGet(mixed $offset): ChatListItem
    {
        return $this->chats[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Chat list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Chat list is read only.');
    }
}