<?php

namespace Twin;

use Throwable;
use TypeError;
use InvalidArgumentException;

trait TypeCasting
{
    private function getTypeCaster(string $type, string $errorPrefix = ''): callable
    {
        $types = [];
        $nullable = false;
        $requiredType = $this->unionTypeToText($type, $types, $nullable);
        return function (mixed $value, mixed $key) use ($types, $nullable, $errorPrefix, $requiredType) {
            if ($value === null) {
                if ($nullable) {
                    return null;
                }
                $this->throwTypeCastingError($errorPrefix, $value, $key, $requiredType);
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
                    case 'scalar':
                        if (is_scalar($value)) {
                            return $value;
                        }
                        break;
                    default:
                        /** @psalm-suppress ArgumentTypeCoercion */
                        if (is_a($value, $type)) {
                            return $value;
                        }
                        try {
                            return new $type($value);
                        } catch (Throwable) {
                            break;
                        }
                }
            }
            $this->throwTypeCastingError($errorPrefix, $value, $key, $requiredType);
        };
    }

    private function throwTypeCastingError(string $prefix, mixed $value, mixed $key, string $requiredType): void
    {
        $actualType = $this->getType($value);
        if ($prefix === 'element') {
            if (is_int($key)) {
                $key = "#$key";
            } else {
                $key = "with key \"$key\"";
            }
        }
        $error = ltrim("$prefix $key must be an instance of type $requiredType, $actualType used");
        throw new InvalidArgumentException($this->formErrorText($error));
    }

    private function getType(mixed $value): string
    {
        $type = gettype($value);
        return match ($type) {
            'NULL' => 'null',
            'integer' => 'int',
            'boolean' => 'bool',
            'double' => 'float',
            default => $type,
        };
    }

    private function toInvalidArgumentException(TypeError $e, string $castTo): void
    {
        throw new InvalidArgumentException($this->formErrorText($this->formTypeErrorMessage($e, $castTo)));
    }

    private function formErrorText(string $validationError): string
    {
        $text = $this->classToText(static::class);
        return "Invalid format of the $text: $validationError.";
    }

    private function formTypeErrorMessage(TypeError $e, ?string $type = null): string
    {
        $error = $e->getMessage();
        if (str_starts_with($error, 'Cannot assign')) {
            preg_match('/^Cannot assign ([0-9?a-zA-Z]+).*\$([a-zA-Z_0-9]+) of type (.+)$/', $error, $matches);
            if ($matches) {
                $types = $this->unionTypeToText($matches[3]);
                $error = "$matches[2] must be an instance of type $types, $matches[1] used";
            }
        } else {
            preg_match(
                '/^.*::[a-z_0-9]+([A-Z]?[a-zA-Z_0-9]*)\(\): Argument #1 \(\$[a-z]+\)(.+given).*$/',
                $error,
                $matches
            );
            if ($matches) {
                if (empty($matches[1]) && $type) {
                    $error = $this->classToText($type);
                } else {
                    $error = lcfirst($matches[1]);
                }
                $error .= $this->unionTypeToText($matches[2]);
            }
        }
        return $error;
    }

    /**
     * @param string $type
     * @param list<string> $types
     * @param bool $nullable
     * @return string
     */
    private function unionTypeToText(string $type, array &$types = [], bool &$nullable = false): string
    {
        $types = $this->splitUnionType($type, $nullable);
        return implode(', ', $types) . ($nullable ? ' or null' : '');
    }

    /**
     * @param string $type
     * @param bool $nullable
     * @return list<string>
     */
    private function splitUnionType(string $type, bool &$nullable = false): array
    {
        $types = [];
        $nullable = false;
        foreach (explode('|', $type) as $t) {
            if ($t[0] === '?') {
                $nullable = true;
                $types[] = ltrim($t, '?');
            } else if ($t === 'null') {
                $nullable = true;
            } else {
                $types[] = $t;
            }
        }
        return $types;
    }

    private function classToText(string $class): string
    {
        if (false !== $pos = strrpos($class, '\\')) {
            $class = substr($class, $pos + 1);
        }
        $words = preg_split('/(?=\p{Lu})/u', $class, -1, PREG_SPLIT_NO_EMPTY);
        $words = array_map('lcfirst', $words);
        return implode(' ', $words);
    }
}