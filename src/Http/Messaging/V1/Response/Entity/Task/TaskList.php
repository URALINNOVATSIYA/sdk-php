<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Task;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class TaskList extends Entity implements Collection
{
    /**
     * @var array<int, TaskListItem>
     */
    protected array $tasks;

    public function __construct(array $tasks)
    {
        $this->assignListProperty('tasks', $tasks, TaskListItem::class);
    }

    /**
     * @return array<int, TaskListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->tasks;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->tasks as $task) {
            $values[] = $task->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, TaskListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->tasks;
    }

    public function count(): int
    {
        return count($this->tasks);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->tasks[(int)$offset]);
    }

    public function offsetGet(mixed $offset): TaskListItem
    {
        return $this->tasks[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Task list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Task list is read only.');
    }
}
