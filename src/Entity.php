<?php

declare(strict_types=1);

namespace Twin\Sdk;

use TypeError;
use RuntimeException;
use InvalidArgumentException;

abstract class Entity
{
    use TypeCasting;

    /**
     * @var string[]
     */
    protected array $__properties = [];

    public function propertyExists(string $property): bool
    {
        return in_array($property, $this->__properties);
    }

    public function toArray(bool $ignoreNulls = false): array
    {
        $values = [];
        if ($ignoreNulls) {
            foreach ($this->__properties as $property) {
                if (null !== $value = $this->{$property}) {
                    $values[$property] = $value;
                }
            }
        } else {
            foreach ($this->__properties as $property) {
                $values[$property] = $this->{$property};
            }
        }
        return $values;
    }

    public function toNestedArray(bool $ignoreNulls = false): array
    {
        $values = [];
        if ($ignoreNulls) {
            foreach ($this->__properties as $property) {
                if (null !== $value = $this->{$property}) {
                    $values[$property] = $value instanceof Entity ? $value->toNestedArray(true) : $value;
                }
            }
        } else {
            foreach ($this->__properties as $property) {
                $value = $this->{$property};
                $values[$property] = $value instanceof Entity ? $value->toNestedArray() : $value;
            }
        }
        return $values;
    }

    protected function assignListProperty(string $property, array $values, string $type): void
    {
        $index = 0;
        $typedValues = [];
        $cast = $this->getTypeCaster($type, 'element');
        foreach ($values as $value) {
            try {
                $typedValues[] = $cast($value, $index);
                ++$index;
            } catch (TypeError $e) {
                throw new InvalidArgumentException($this->formErrorText($e->getMessage()));
            }
        }
        $this->assignProperty($property, $typedValues);
    }

    protected function assignMapProperty(string $property, array $values, string $keyType, string $valueType): void
    {
        $typedValues = [];
        $keyCast = $this->getTypeCaster($keyType, 'key');
        $valueCast = $this->getTypeCaster($valueType, 'element');
        foreach ($values as $key => $value) {
            try {
                /** @psalm-suppress MixedArrayOffset */
                $typedValues[$keyCast($key, $key)] = $valueCast($value, $key);
            } catch (TypeError $e) {
                throw new InvalidArgumentException($this->formErrorText($e->getMessage()));
            }
        }
        $this->assignProperty($property, $typedValues);
    }

    /**
     * @param array $values
     * @param array<string|int, string|array{key?: string, castTo?: string}> $propertyMap
     * @param bool $ignoreNonExistingValues
     * @return void
     */
    protected function assignProperties(array $values, array $propertyMap, bool $ignoreNonExistingValues = false): void
    {
        foreach ($propertyMap as $property => $key) {
            if (is_array($key)) {
                $castTo = $key['castTo'] ?? '';
                $key = $key['key'] ?? null;
            } else {
                $castTo = '';
            }
            if (is_int($property)) {
                if ($key === null) {
                    throw new RuntimeException("Key of element #$property is not defined.");
                }
                $property = $key;
            } else if ($key === null) {
                $key = $property;
            }
            if ($ignoreNonExistingValues && !key_exists($key, $values)) {
                continue;
            }
            $this->assignProperty($property, $values[$key] ?? null, $castTo);
        }
    }

    protected function assignProperty(string $property, mixed $value, string $castTo = ''): void
    {
        if ($castTo) {
            $this->{$property} = $this->getTypeCaster($castTo)($value, $property);
        } else {
            try {
                $this->{$property} = $value;
            } catch (TypeError $e) {
                $this->toInvalidArgumentException($e, $castTo);
            }
        }
        $this->__properties[] = $property;
    }
}