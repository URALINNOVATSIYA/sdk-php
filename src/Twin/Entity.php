<?php

namespace Twin;

use InvalidArgumentException;
use TypeError;

abstract class Entity implements Arrayable
{
    /**
     * @var string[]
     */
    protected array $__properties = [];

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
                    $values[$property] = $value instanceof Arrayable ? $value->toNestedArray(true) : $value;
                }
            }
        } else {
            foreach ($this->__properties as $property) {
                $value = $this->{$property};
                $values[$property] = $value instanceof Arrayable ? $value->toNestedArray() : $value;
            }
        }
        return $values;
    }

    public function propertyExists(string $property): bool
    {
        return in_array($property, $this->__properties);
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
                $typedValues[$keyCast($key, $key)] = $valueCast($value, $key);
            } catch (TypeError $e) {
                throw new InvalidArgumentException($this->formErrorText($e->getMessage()));
            }
        }
        $this->assignProperty($property, $typedValues);
    }

    private function getTypeCaster(string $type, string $errorPrefix): callable
    {
        $nullable = false;
        $types = explode('|', $type);
        foreach ($types as &$t) {
            if ($t[0] === '?') {
                $nullable = true;
                $t = ltrim($t, '?');
            }
        }
        $requiredType = implode(', ', $types) . ($nullable ? ' or null' : '');

        return function (mixed $value, mixed $key) use ($types, $nullable, $errorPrefix, $requiredType) {
            if ($value === null) {
                if ($nullable) {
                    return null;
                }
                $this->throwInvalidItemError($errorPrefix, $value, $key, $requiredType);
            }
            foreach ($types as $type) {
                switch ($type) {
                    case 'string':
                        if (is_string($value)) {
                            return $value;
                        }
                        break;
                    case 'bool':
                        if (is_bool($value)) {
                            return $value;
                        }
                        break;
                    case 'int':
                        if (is_int($value)) {
                            return $value;
                        }
                        break;
                    case 'float':
                        if (is_float($value)) {
                            return $value;
                        }
                        break;
                    default:
                        try {
                            return new $type($value);
                        } catch (TypeError) {
                            break;
                        }
                }
            }
            $this->throwInvalidItemError($errorPrefix, $value, $key, $requiredType);
        };
    }

    private function throwInvalidItemError(string $prefix, mixed $value, mixed $key, string $requiredType): void
    {
        $actualType = strtolower(gettype($value));
        if ($prefix === 'element') {
            if (is_int($key)) {
                $key = "#$key";
            } else {
                $key = "with key \"$key\"";
            }
        }
        throw new TypeError("$prefix $key must be of type $requiredType, $actualType given");
    }

    protected function assignProperty(string $property, mixed $value, ?string $type = null): void
    {
        try {
            if ($type) {
                if ($type[0] === '?') {
                    $nullable = true;
                    $type = ltrim($type, '?');
                } else {
                    $nullable = false;
                }
                $this->{$property} = $nullable && $value === null ? null : new $type($value);
            } else {
                $this->{$property} = $value;
            }
        } catch (TypeError $e) {
            throw new InvalidArgumentException($this->formErrorText($this->formTypeErrorMessage($e, $type)));
        }
        $this->__properties[] = $property;
    }

    protected function assignProperties(array $values, array $propertyMap, bool $ignoreNonExistingValues = false): void
    {
        foreach ($propertyMap as $property => $key) {
            if (is_array($key)) {
                $type = $key['type'] ?? null;
                $key = $key['key'] ?? null;
            } else {
                $type = null;
            }
            if (is_int($property)) {
                $property = $key;
            } else if ($key === null) {
                $key = $property;
            }
            if ($ignoreNonExistingValues && !key_exists($key, $values)) {
                continue;
            }
            $this->assignProperty($property, $values[$key] ?? null, $type);
        }
    }

    private function formErrorText(string $validationError): string
    {
        $text = $this->typeToText(static::class);
        return "Invalid format of the $text: $validationError.";
    }

    private function formTypeErrorMessage(TypeError $e, ?string $type = null): string
    {
        $error = $e->getMessage();
        if (strncmp('Cannot assign', $error, 13) === 0) {
            preg_match('/^Cannot assign ([0-9?a-zA-Z]+).*\$([a-zA-Z_0-9]+)(.+)$/', $error, $matches);
            if ($matches) {
                $matches[3] = preg_replace('/\?([\\\\0-9_a-zA-Z]+)/', '$1 or null', $matches[3]);
                $error = "$matches[2] must be an instance$matches[3], $matches[1] used";
            }
        } else {
            preg_match(
                '/^.*::[a-z_0-9]+([A-Z]?[a-zA-Z_0-9]*)\(\): Argument #1 \(\$[a-z]+\)(.+given).*$/',
                $error,
                $matches
            );
            if ($matches) {
                $matches[2] = preg_replace('/\?([\\\\0-9_a-zA-Z]+)/', '$1 or null', $matches[2]);
                if (empty($matches[1]) && $type) {
                    $error = $this->typeToText($type);
                } else {
                    $error = lcfirst($matches[1]);
                }
                $error .= $matches[2];
            }
        }
        return $error;
    }

    private function typeToText(string $type): string
    {
        $class = substr($type, strrpos($type, '\\') + 1);
        $words = preg_split('/(?=\p{Lu})/u', $class, -1, PREG_SPLIT_NO_EMPTY);
        $words = array_map('lcfirst', $words);
        return implode(' ', $words);
    }
}