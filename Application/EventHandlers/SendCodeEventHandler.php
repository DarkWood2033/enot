<?php

namespace Application\EventHandlers;

use Application\Contracts\Messages\IMessageProviderStrategy;
use Application\Messages\ChangePasswordMessage;
use Domain\Events\SentRequestToChangePasswordEvent;

readonly class SendCodeEventHandler
{
    public function __construct(
        private IMessageProviderStrategy $message_provider_strategy
    ) {}

    public function handle(SentRequestToChangePasswordEvent $event): void
    {
        $message_provider = $this->message_provider_strategy->create(
            $event->confirmation->getUser(),
            $event->confirmation->getType()
        );
        $message = new ChangePasswordMessage($event->confirmation);
        $message_provider->send($message);
    }
}