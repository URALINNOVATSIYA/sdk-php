<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Bandwidth;

use Twin\Sdk\Http\Messaging\V1\Response\Bandwidth\BandwidthListCollection;
use Twin\Sdk\Http\Response;

class BandwidthListResponse extends Response
{
    public ?BandwidthListCollection $body;

    protected string $castBodyTo = '?' . BandwidthListCollection::class;
}
