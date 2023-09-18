<?php

namespace WebApi\Requests;

use Domain\Enums\NotificationType;

class RequestChangePasswordRequest
{
    public function __construct(
        public string $password,
        public NotificationType $type
    ){}
}