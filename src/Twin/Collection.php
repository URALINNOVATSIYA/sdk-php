<?php

declare(strict_types=1);

namespace Twin;

use ArrayAccess;
use Countable;
use IteratorAggregate;

interface Collection extends Countable, IteratorAggregate, ArrayAccess
{
}