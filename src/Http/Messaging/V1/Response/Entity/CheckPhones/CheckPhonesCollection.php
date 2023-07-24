<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\CheckPhones;

use Twin\Sdk\Entity;

class CheckPhonesCollection extends Entity
{
    public string $checkId;
    public PhonesResultMap $result;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'checkId',
            'result' => ['castTo' => PhonesResultMap::class]
        ]);
    }
}
