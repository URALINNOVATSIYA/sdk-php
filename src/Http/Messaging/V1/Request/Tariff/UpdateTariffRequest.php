<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Tariff;

use Twin\Sdk\Http\Messaging\V1\Request\Tariff\Entity\TariffList;
use Twin\Sdk\Http\Request;

class UpdateTariffRequest extends Request
{
    public string|int|null $companyId;
    public ?TariffList $tariffs;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'companyId',
            'tariffs' => ['castTo' => '?' . TariffList::class],
        ]);
    }
}
