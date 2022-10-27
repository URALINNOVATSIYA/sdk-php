<?php

declare(strict_types=1);

namespace Twin\Http\IAM\V1\Response;

use Twin\Http\IAM\V1\Response\Entity\UserCollection;
use Twin\Http\Response;

final class UserListResponse extends Response
{
    public ?UserCollection $body;

    protected string $castBodyTo = '?' . UserCollection::class;
}