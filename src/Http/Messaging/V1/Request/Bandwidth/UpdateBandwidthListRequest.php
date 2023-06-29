<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Bandwidth;

use Twin\Sdk\Http\Messaging\V1\Request\Bandwidth\Entity\BandwidthList;
use Twin\Sdk\Http\Request;

class UpdateBandwidthListRequest extends Request
{
    public ?BandwidthList $bandwidthList;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'bandwidthList' => ['castTo' => '?' . BandwidthList::class],
        ]);
    }
}
