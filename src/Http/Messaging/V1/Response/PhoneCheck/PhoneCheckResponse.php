<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\PhoneCheck;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\CheckPhones\CheckPhonesCollection;
use Twin\Sdk\Http\Response;

class PhoneCheckResponse extends Response
{
    public ?CheckPhonesCollection $body;

    protected string $castBodyTo = '?' . CheckPhonesCollection::class;
}
