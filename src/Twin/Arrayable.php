<?php

namespace Twin;

interface Arrayable
{
    public function toArray(bool $ignoreNulls = false): array;

    public function toNestedArray(bool $ignoreNulls = false): array;
}