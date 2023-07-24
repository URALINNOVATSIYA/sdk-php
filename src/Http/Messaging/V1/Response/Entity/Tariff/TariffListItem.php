<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Tariff;

use Twin\Sdk\Entity;

final class TariffListItem extends Entity
{
    public ?int $mcc_mnc_id = null;
    public ?int $mcc_mnc = null;
    public ?string $iso = null;
    public ?string $country = null;
    public ?string $network = null;
    public ?string $price = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'mcc_mnc',
            'iso',
            'country',
            'network',
            'price',
        ], true);
    }
}
