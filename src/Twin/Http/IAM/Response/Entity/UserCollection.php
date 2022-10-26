<?php

declare(strict_types=1);

namespace Twin\Http\IAM\Response\Entity;

use Twin\Entity;

final class UserCollection extends Entity
{
    public ?int $count;
    public ?UserList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['type' => '?' . UserList::class]
        ]);
    }
}