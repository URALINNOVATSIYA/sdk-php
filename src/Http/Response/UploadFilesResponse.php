<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\Response;

use Twin\Sdk\Http\Response;
use Twin\Sdk\Http\Response\Entity\FileMetadataList;

class UploadFilesResponse extends Response
{
    public ?FileMetadataList $body;

    protected string $castBodyTo = '?' . FileMetadataList::class;
}
