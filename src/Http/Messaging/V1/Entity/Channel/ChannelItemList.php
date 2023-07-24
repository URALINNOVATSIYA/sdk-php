<?php

namespace Twin\Sdk\Http\Messaging\V1\Entity\Channel;

use Twin\Sdk\Entity;

class ChannelItemList extends Entity
{
    public ?string $provider = null;
    public ?int $validityPeriod = null;
    public ?string $text = null;
    public ?string $subject = null;
    public ?string $fromEmail = null;
    public ?string $fromName = null;
    public ?string $replyTo = null;
    public ?string $from = null;
    public ?string $imageUrl = null;
    public ?string $buttonUrl = null;
    public ?string $buttonText = null;
    public ?string $templateName = null;
    public ?string $templateNamespace = null;
    public ?ChannelTemplateMap $templateData = null;
    public ?string $language = null;
    public ?string $mediaUrl = null;
    public ?string $documentFilename = null;
    public ?VkAttachmentsMap $attachments = null;
    public ?string $chatId = null;
    public ?string $botId = null;
    public ?string $messengerType = null;
    public ?string $chatSessionName = null;
    public ?bool $continueLastOrStartNewSession = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'provider',
            'validityPeriod',
            'text',
            'subject',
            'fromEmail',
            'fromName',
            'replyTo',
            'from',
            'imageUrl',
            'buttonUrl',
            'buttonText',
            'templateName',
            'templateNamespace',
            'templateData' => ['castTo' => '?' . ChannelTemplateMap::class],
            'language',
            'mediaUrl',
            'documentFilename',
            'attachments' => ['castTo' => '?' . VkAttachmentsMap::class],
            'chatId',
            'botId',
            'messengerType',
            'chatSessionName',
            'continueLastOrStartNewSession',
        ], true);
    }
}
