<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Sender;

use Twin\Sdk\Http\Messaging\V1\Request\Sender\Entity\SenderList;
use Twin\Sdk\Http\Request;

class UpdateSenderRequest extends Request
{
    public string|int|null $companyId;
    public ?SenderList $senders;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'companyId',
            'senders' => ['castTo' => '?' . SenderList::class],
        ]);
    }
}
