<?php

namespace WebApi\Requests;

readonly class ConfirmChangePasswordRequest
{
    public function __construct(
        public string $code,
        public string $session
    ) {}
}