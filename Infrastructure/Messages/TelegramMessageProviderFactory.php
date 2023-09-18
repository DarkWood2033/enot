<?php

namespace Infrastructure\Messages;

use Application\Contracts\Messages\IMessageProvider;
use Application\Contracts\Messages\IMessageProviderFactory;
use Domain\Enums\NotificationType;

class TelegramMessageProviderFactory implements IMessageProviderFactory
{
    public function create(): IMessageProvider
    {
        return new TelegramMessageProvider();
    }

    public function isType(NotificationType $type): bool
    {
        return $type == NotificationType::Telegram;
    }
}