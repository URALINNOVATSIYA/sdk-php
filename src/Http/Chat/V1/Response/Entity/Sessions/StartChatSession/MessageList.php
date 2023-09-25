<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class MessageList extends Entity implements Collection
{
    /**
     * @var array<int, MessageListItem>
     */
    protected array $messages;

    public function __construct(array $messages)
    {
        $this->assignListProperty('messages', $messages, MessageListItem::class);
    }

    /**
     * @return array<int, MessageListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->messages;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->messages as $message) {
            $values[] = $message->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, MessageListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->messages;
    }

    public function count(): int
    {
        return count($this->messages);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->messages[(int)$offset]);
    }

    public function offsetGet(mixed $offset): MessageListItem
    {
        return $this->messages[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Message list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Message list is read only.');
    }
}