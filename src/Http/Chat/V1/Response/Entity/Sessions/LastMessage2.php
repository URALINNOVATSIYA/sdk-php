<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions;

use Twin\Sdk\Entity;

class LastMessage2 extends Entity
{
    public ?string $city = null;
    public ?string $country_code = null;
    public ?string $country_name = null;
    public ?string $region_name = null;
    public ?string $region_code = null;
    public ?string $time_zone = null;
    public ?string $zip_code = null;
    public ?float $latitude = null;
    public ?float $longitude = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'city',
            'country_code',
            'country_name',
            'region_name',
            'region_code',
            'time_zone',
            'zip_code',
            'latitude',
            'longitude',
        ], true);
    }
}