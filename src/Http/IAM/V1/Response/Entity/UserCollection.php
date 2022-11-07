<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\Entity;

use Twin\Sdk\Entity;

final class UserCollection extends Entity
{
    public ?int $count;
    public ?UserList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => '?' . UserList::class]
        ]);
    }
}