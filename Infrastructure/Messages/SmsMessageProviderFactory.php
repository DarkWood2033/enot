<?php

namespace Infrastructure\Messages;

use Application\Contracts\Messages\IMessageProvider;
use Application\Contracts\Messages\IMessageProviderFactory;
use Domain\Enums\NotificationType;

class SmsMessageProviderFactory implements IMessageProviderFactory
{
    public function create(): IMessageProvider
    {
        return new SmsMessageProvider();
    }

    public function isType(NotificationType $type): bool
    {
        return $type == NotificationType::Sms;
    }
}