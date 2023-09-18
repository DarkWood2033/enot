<?php

namespace Application\Contracts\Messages;

use Domain\Entities\User;
use Domain\Enums\NotificationType;

interface IMessageProviderStrategy
{
    public function create(User $user, NotificationType $type): IMessageProvider;
}