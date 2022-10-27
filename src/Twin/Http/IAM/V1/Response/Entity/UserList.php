<?php

namespace Twin\Http\IAM\V1\Response\Entity;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Collection;
use Twin\Entity;

final class UserList extends Entity implements Collection
{
    /**
     * @var UserListItem[]
     */
    protected array $users;

    public function __construct(array $users)
    {
        $this->assignListProperty('users', $users, UserListItem::class);
    }

    /**
     * @return UserListItem[]
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->users;
    }

    /**
     * @return array[]
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->users as $user) {
            $values[] = $user->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, UserListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->users;
    }

    public function count(): int
    {
        return count($this->users);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->roles[$offset]);
    }

    public function offsetGet(mixed $offset): UserRole
    {
        if (!isset($this->roles[$offset])) {
            throw new OutOfBoundsException('Array index out of bounds.');
        }
        return $this->roles[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('User list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('User list is read only.');
    }
}