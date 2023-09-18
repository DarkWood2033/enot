<?php

namespace Domain\Events;

use Domain\Common\DomainEvent;
use Domain\Entities\User;

class ChangedPasswordEvent extends DomainEvent
{
    public function __construct(
        public readonly User $user
    ) {}
}