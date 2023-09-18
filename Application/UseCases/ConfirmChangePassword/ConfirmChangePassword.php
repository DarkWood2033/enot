<?php

namespace Application\UseCases\ConfirmChangePassword;

readonly class ConfirmChangePassword
{
    public function __construct(
        public int $user_id,
        public string $session,
        public string $code
    ) {}
}