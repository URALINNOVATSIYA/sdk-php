<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Tariff;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class TariffList extends Entity implements Collection
{
    /**
     * @var array<int, TariffListItem>
     */
    protected array $tariffs;

    public function __construct(array $tariffs)
    {
        $this->assignListProperty('tariffs', $tariffs, TariffListItem::class);
    }

    /**
     * @return array<int, TariffListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->tariffs;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->tariffs as $tariff) {
            $values[] = $tariff->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, TariffListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->tariffs;
    }

    public function count(): int
    {
        return count($this->tariffs);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->tariffs[(int)$offset]);
    }

    public function offsetGet(mixed $offset): TariffListItem
    {
        return $this->tariffs[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Tariff list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Tariff list is read only.');
    }
}
