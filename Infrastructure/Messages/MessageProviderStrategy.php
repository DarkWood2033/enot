<?php

namespace Infrastructure\Messages;

use Application\Contracts\Messages\IMessageProvider;
use Application\Contracts\Messages\IMessageProviderFactory;
use Application\Contracts\Messages\IMessageProviderStrategy;
use Domain\Entities\User;
use Domain\Enums\NotificationType;
use Exception;

class MessageProviderStrategy implements IMessageProviderStrategy
{
    /**
     * @param IMessageProviderFactory[] $message_providers
     */
    public function __construct(
        public array $message_providers
    ) {}

    /**
     * @throws Exception
     */
    public function create(User $user, NotificationType $type): IMessageProvider
    {
        foreach ($this->message_providers as $message_provider) {
            if ($message_provider->isType($type)) {
                return $message_provider->create($user);
            }
        }

        throw new Exception("Message provider not registered");
    }
}