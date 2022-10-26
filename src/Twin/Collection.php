<?php

namespace Twin;

use ArrayAccess;
use Countable;
use IteratorAggregate;

interface Collection extends Countable, IteratorAggregate, ArrayAccess, Arrayable
{
}