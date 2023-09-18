<?php

namespace WebApi\ViewModels;

readonly class SessionViewModel
{
    public function __construct(
        public string $session
    ) {}
}