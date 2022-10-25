<?php

declare(strict_types=1);

namespace Twin\Http\IAM\Response\Entity;

use ArrayAccess;
use Countable;
use Generator;
use IteratorAggregate;
use LogicException;
use OutOfBoundsException;
use Twin\Mapper;

final class SettingsMap implements Countable, IteratorAggregate, ArrayAccess
{
    use Mapper;

    /**
     * @var array<string, string|int|float|bool>
     */
    private array $settings;

    public function __construct(array $settings)
    {
        $this->assignMapProperty('settings', $settings, 'string', 'string|bool|int|float');
    }

    /**
     * @return array<string, string|int|float|bool>
     */
    public function toArray(): array
    {
        return $this->settings;
    }

    /**
     * @return array<string, string|int|float|bool>
     */
    public function toNestedArray(): array
    {
        return $this->settings;
    }

    /**
     * @psalm-return array<string, string|int|float|bool>
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
        return isset($this->settings[$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        if (!isset($this->settings[$offset])) {
            throw new OutOfBoundsException('Array index out of bounds.');
        }
        return $this->settings[$offset];
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