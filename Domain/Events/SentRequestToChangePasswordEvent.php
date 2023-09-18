<?php

namespace Domain\Events;

use Domain\Common\DomainEvent;
use Domain\Entities\Confirmation;

class SentRequestToChangePasswordEvent extends DomainEvent
{
    public function __construct(
        public readonly Confirmation $confirmation
    ) {}
}