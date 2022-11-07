<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response;

use Twin\Sdk\Http\IAM\V1\Response\Entity\UserCollection;
use Twin\Sdk\Http\Response;

final class UserListResponse extends Response
{
    public ?UserCollection $body;

    protected string $castBodyTo = '?' . UserCollection::class;
}