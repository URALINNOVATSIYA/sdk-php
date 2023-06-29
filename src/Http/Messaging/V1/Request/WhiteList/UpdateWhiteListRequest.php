<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\WhiteList;

use Twin\Sdk\Http\Messaging\V1\Request\WhiteList\Entity\WhiteList;
use Twin\Sdk\Http\Request;

class UpdateWhiteListRequest extends Request
{
    public ?WhiteList $items;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'items' => ['castTo' => '?' . WhiteList::class],
        ]);
    }
}
