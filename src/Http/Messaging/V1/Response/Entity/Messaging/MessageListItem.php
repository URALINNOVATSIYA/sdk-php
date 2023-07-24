<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging;

use DateTimeImmutable;
use Twin\Sdk\Entity;
use Twin\Sdk\Http\Messaging\V1\Entity\Channel\ChannelItemList;
use Twin\Sdk\Http\Messaging\V1\Entity\Channel\Destination;

class MessageListItem extends Entity
{
    public string $id;
    public string $bulkId;
    public string $groupId;
    public string $flowId;
    public string $status;
    public int $statusCode;
    public string $statusDescription;
    public int $partCount;
    public ?string $network = null;
    public string $channel;
    public ?string $templateId = null;
    public ?string $templateName = null;
    public Destination $destination;
    public ChannelItemList $message;
    public ?TemplateVariablesMap $templateVariables = null;
    public TracksMap $tracks;
    public DateTimeImmutable $createdAt;
    public ?DateTimeImmutable $sentAt = null;
    public ?DateTimeImmutable $deliveredAt = null;
    public ?DateTimeImmutable $sendAt = null;
    public ?DateTimeImmutable $expiredAt = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'bulkId',
            'groupId',
            'flowId',
            'status',
            'statusCode',
            'statusDescription',
            'partCount',
            'network',
            'channel',
            'templateId',
            'templateName',
            'destination' => ['castTo' => Destination::class],
            'message' => ['castTo' => ChannelItemList::class],
            'templateVariables' => ['castTo' => '?' . TemplateVariablesMap::class],
            'tracks' => ['castTo' => TracksMap::class],
            'createdAt' => ['castTo' => DateTimeImmutable::class],
            'sentAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'deliveredAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'sendAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'expiredAt' => ['castTo' => '?' . DateTimeImmutable::class],
        ], true);
    }
}
