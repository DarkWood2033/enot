<?php

namespace Infrastructure\Messages;

use Application\Contracts\Messages\IMessage;
use Application\Contracts\Messages\IMessageProvider;

readonly class TelegramMessageProvider implements IMessageProvider
{
    public function __construct(
        public string $telegram
    ) {}

    public function send(IMessage $message): void
    {
        // TODO: Implement send() method.
    }
}