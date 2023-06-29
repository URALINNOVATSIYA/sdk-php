<?php

namespace Twin\Sdk\Http\Messaging\V1\Entity\Channel;

use Twin\Sdk\Entity;

class Destination extends Entity
{
    public ?string $phone = null;
    public ?string $email = null;
    public ?string $clientId = null;
    public ?string $externalId = null;
    public ?string $chatSessionId = null;
    public ?string $messengerUserId = null;
    public ?DestinationVariablesMap $variables = null;
    public ?string $pushRegistrationId = null;
    public ?string $platform = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'phone',
            'email',
            'clientId',
            'externalId',
            'messengerUserId',
            'variables' => ['castTo' => '?' . DestinationVariablesMap::class],
            'pushRegistrationId',
            'platform',
        ], true);
    }
}
