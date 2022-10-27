<?php

declare(strict_types=1);

namespace Twin\Http\Response\Entity;

use Generator;
use LogicException;
use OutOfBoundsException;
use Twin\Collection;
use Twin\Entity;

class FileMetadataList extends Entity implements Collection
{
    /**
     * @var array<int, FileMetadata>
     */
    protected array $files;

    public function __construct(array $files)
    {
        $this->assignListProperty('files', $files, FileMetadata::class);
    }

    /**
     * @return array<int, FileMetadata>
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->files;
    }

    /**
     * @return array<int, array>
     */
    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        foreach ($this->files as $file) {
            $values[] = $file->toNestedArray($ignoreNulls);
        }
        return $values;
    }

    /**
     * @psalm-return Generator<int, FileMetadata>
     */
    public function getIterator(): Generator
    {
        yield from $this->files;
    }

    public function count(): int
    {
        return count($this->files);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->files[(int)$offset]);
    }

    public function offsetGet(mixed $offset): FileMetadata
    {
        return $this->files[(int)$offset] ?? throw new OutOfBoundsException('Array index out of bounds.');;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException('File metadata list is read only.');
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException('File metadata list is read only.');
    }
}