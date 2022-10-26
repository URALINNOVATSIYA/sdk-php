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
     * @var FileMetadata[]
     */
    protected array $files;

    public function __construct(array $files)
    {
        $this->assignListProperty('files', $files, FileMetadata::class);
    }

    /**
     * @return FileMetadata[]
     */
    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->files;
    }

    /**
     * @return array[]
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
     * @psalm-return FileMetadata[]
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
        return isset($this->roles[$offset]);
    }

    public function offsetGet(mixed $offset): FileMetadata
    {
        if (!isset($this->roles[$offset])) {
            throw new OutOfBoundsException('Array index out of bounds.');
        }
        return $this->roles[$offset];
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