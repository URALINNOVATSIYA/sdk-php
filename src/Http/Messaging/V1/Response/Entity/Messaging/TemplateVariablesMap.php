<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class TemplateVariablesMap extends Entity implements Collection
{
    /**
     * @var array<string, scalar>
     */
    protected array $variables;

    public function __construct(array $variables)
    {
        $this->assignMapProperty('variables', $variables, 'string', 'scalar');
    }

    /**
     * @return array<string, scalar>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->variables;
    }

    /**
     * @return array<string, scalar>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->variables;
    }

    /**
     * @psalm-return Generator<string, scalar>
     */
    public function getIterator(): Generator
    {
        yield from $this->variables;
    }

    public function count(): int
    {
        return count($this->variables);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->variables[(string)$offset]);
    }

    public function offsetGet(mixed $offset): string|int|float|bool
    {
        return $this->variables[(string)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Template variables list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Template variables list is read only.');
    }
}
