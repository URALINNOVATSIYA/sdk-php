<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Tariff;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Tariff\TariffCollection;
use Twin\Sdk\Http\Response;

class TariffListResponse extends Response
{
    public ?TariffCollection $body;

    protected string $castBodyTo = '?' . TariffCollection::class;
}
