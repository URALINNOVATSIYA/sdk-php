<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Tariff\Entity;

use Twin\Sdk\Entity;

class TariffListItem extends Entity
{
    public int|string $mcc_mnc_id;
    public int|string|null $mcc_mnc = null;
    public ?string $iso = null;
    public ?string $country = null;
    public ?string $network = null;
    public float|int|string $price;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'mcc_mnc_id',
            'mcc_mnc',
            'iso',
            'country',
            'network',
            'price',
        ], true);
    }
}
