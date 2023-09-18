<?php

namespace WebApi\ViewModels;

readonly class MessageViewModel
{
    public function __construct(
        public string $message
    ) {}
}