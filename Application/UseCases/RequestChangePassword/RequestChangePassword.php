<?php

namespace Application\UseCases\RequestChangePassword;

use Domain\Enums\NotificationType;

readonly class RequestChangePassword
{
    public function __construct(
        public int $user_id,
        public string $password,
        public NotificationType $notification_type
    ) {}
}