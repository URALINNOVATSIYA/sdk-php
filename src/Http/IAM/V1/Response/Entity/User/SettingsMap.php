<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\Entity\User;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

final class SettingsMap extends Entity implements Collection
{
    /**
     * @var array<string, scalar>
     */
    protected array $settings;

    public function __construct(array $settings)
    {
        $this->assignMapProperty('settings', $settings, 'string', 'scalar');
    }

    /**
     * @return array<string, scalar>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->settings;
    }

    /**
     * @return array<string, scalar>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->settings;
    }

    /**
     * @psalm-return Generator<string, scalar>
     */
    public function getIterator(): Generator
    {
        yield from $this->settings;
    }

    public function count(): int
    {
        return count($this->settings);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->settings[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->settings[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Setting list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Setting list is read only.');
    }
}
