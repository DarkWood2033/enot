<?php

namespace Infrastructure\Messages;

use Application\Contracts\Messages\IMessage;
use Application\Contracts\Messages\IMessageProvider;

readonly class EmailMessageProvider implements IMessageProvider
{
    public function __construct(
        public string $email
    ) {}

    public function send(IMessage $message): void
    {
        // TODO: Implement send() method.
    }
}