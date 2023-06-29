<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Template;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Template\CreateTemplate;
use Twin\Sdk\Http\Response;

class CreateTemplateResponse extends Response
{
    public ?CreateTemplate $body;

    protected string $castBodyTo = '?' . CreateTemplate::class;
}
