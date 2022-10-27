<?php

declare(strict_types=1);

namespace Twin\Http\Response;

use Twin\Http\Response;
use Twin\Http\Response\Entity\FileMetadataList;

class UploadFilesResponse extends Response
{
    public ?FileMetadataList $body;

    protected string $castBodyTo = '?' . FileMetadataList::class;
}