<?php

declare(strict_types=1);

namespace Twin\Http\IAM\V1\Response\Entity;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Collection;
use Twin\Entity;

final class UserRoleList extends Entity implements Collection
{
    /**
     * @var UserRole[]
     */
    protected array $roles;

    public function __construct(array $roles)
    {
        $this->assignListProperty('roles', $roles, UserRole::class);
    }

    /**
     * @return UserRole[]
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->roles;
    }

    /**
     * @return array[]
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->roles as $role) {
            $values[] = $role->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, UserRole>
     */
    public function getIterator(): Generator
    {
        yield from $this->roles;
    }

    public function count(): int
    {
        return count($this->roles);
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
        throw new LogicException('User role list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('User role list is read only.');
    }
}