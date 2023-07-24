<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Template;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Sdk\Collection;
use Twin\Sdk\Entity;

class TemplateList extends Entity implements Collection
{
    /**
     * @var array<int, TemplateListItem>
     */
    protected array $templates;

    public function __construct(array $templates)
    {
        $this->assignListProperty('templates', $templates, TemplateListItem::class);
    }

    /**
     * @return array<int, TemplateListItem>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->templates;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->templates as $template) {
            $values[] = $template->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, TemplateListItem>
     */
    public function getIterator(): Generator
    {
        yield from $this->templates;
    }

    public function count(): int
    {
        return count($this->templates);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->templates[(int)$offset]);
    }

    public function offsetGet(mixed $offset): TemplateListItem
    {
        return $this->templates[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('Template list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('Template list is read only.');
    }
}
