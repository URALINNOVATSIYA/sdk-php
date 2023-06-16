<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\Entity;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

final class UserRoleList extends Entity implements Collection
{
    /**
     * @var array<int, UserRole>
     */
    protected array $roles;

    public function __construct(array $roles)
    {
        $this->assignListProperty('roles', $roles, UserRole::class);
    }

    /**
     * @return array<int, UserRole>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->roles;
    }

    /**
     * @return array<int, array>
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
        return isset($this->roles[(int)$offset]);
    }

    public function offsetGet(mixed $offset): UserRole
    {
        return $this->roles[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
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
