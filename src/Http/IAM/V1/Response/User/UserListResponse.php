<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\User;

use Twin\Sdk\Http\IAM\V1\Response\Entity\User\UserCollection;
use Twin\Sdk\Http\Response;

class UserListResponse extends Response
{
    public ?UserCollection $body;

    protected string $castBodyTo = '?' . UserCollection::class;
}
