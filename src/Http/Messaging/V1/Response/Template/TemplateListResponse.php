<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Template;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Template\TemplateCollection;
use Twin\Sdk\Http\Response;

class TemplateListResponse extends Response
{
    public ?TemplateCollection $body;

    protected string $castBodyTo = '?' . TemplateCollection::class;
}
