<?php

declare(strict_types=1);

namespace Twin\Sdk;

use ArrayAccess;
use Countable;
use IteratorAggregate;

interface Collection extends Countable, IteratorAggregate, ArrayAccess
{
}
