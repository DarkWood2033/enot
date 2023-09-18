<?php

namespace Infrastructure\Messages;

use Application\Contracts\Messages\IMessageProvider;
use Application\Contracts\Messages\IMessageProviderFactory;
use Domain\Entities\User;
use Domain\Enums\NotificationType;

class EmailMessageProviderFactory implements IMessageProviderFactory
{
    public function create(User $user): IMessageProvider
    {
        return new EmailMessageProvider($user->getEmail());
    }

    public function isType(NotificationType $type): bool
    {
        return $type == NotificationType::Email;
    }
}