<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Bots;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\CopyBot\AgentMap;
use Twin\Sdk\Http\Request;

class CopyBotRequest extends Request
{
    public ?string $name = null;
    public ?int $companyId = null;
    public ?AgentMap $agents = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'companyId',
            'name',
            'agents' =>  ['castTo' => '?' . AgentMap::class]
        ]);
    }
}