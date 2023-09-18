<?php

namespace Application\Contracts\Messages;

use Domain\Entities\User;
use Domain\Enums\NotificationType;

interface IMessageProviderFactory
{
    public function create(User $user): IMessageProvider;
    public function isType(NotificationType $type): bool;
}