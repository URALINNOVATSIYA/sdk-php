<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions;

use Twin\Sdk\Entity;

class AttachmentListItem extends Entity
{
    public ?string $id = null;
    public ?string $name = null;
    public ?string $contentType = null;
    public ?int $size = null;
    public ?bool $private = null;
    public ?string $url = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'name',
            'contentType',
            'size',
            'private',
            'url'
        ], true);
    }
}