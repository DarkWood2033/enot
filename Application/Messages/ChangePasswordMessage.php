<?php

namespace Application\Messages;

use Application\Contracts\Messages\IMessage;
use Domain\Entities\Confirmation;

readonly class ChangePasswordMessage implements IMessage
{
    public function __construct(
        public Confirmation $confirmation
    ) {}

    public function getText(): string
    {
        return "Код: {$this->confirmation->getCode()->code}";
    }
}