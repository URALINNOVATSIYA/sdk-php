<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Template;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Template\TemplateListItem;
use Twin\Sdk\Http\Response;

class TemplateDataResponse extends Response
{
    public ?TemplateListItem $body;

    protected string $castBodyTo = '?' . TemplateListItem::class;
}
