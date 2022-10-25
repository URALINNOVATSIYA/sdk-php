<?php

declare(strict_types=1);

namespace Twin\Http\IAM\Response\Entity;

use Countable;
use Generator;
use LogicException;
use OutOfBoundsException;
use ArrayAccess;
use IteratorAggregate;
use Twin\Mapper;

final class UserRoleList implements Countable, IteratorAggregate, ArrayAccess
{
    use Mapper;

    /**
     * @var UserRole[]
     */
    private array $roles;

    public function __construct(array $roles)
    {
        $this->assignListProperty('roles', $roles, UserRole::class);
    }

    /**
     * @return UserRole[]
     */
    public function toArray(): array
    {
        return $this->roles;
    }

    /**
     * @return array[]
     */
    public function toNestedArray(): array
    {
        $values = [];
        foreach ($this->roles as $role) {
            $values[] = $role->toNestedArray();
        }
        return $values;
    }

    /**
     * @psalm-return UserRole[]
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