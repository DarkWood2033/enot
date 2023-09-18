<?php

namespace Application\EventHandlers;

use Domain\Events\ChangedPasswordEvent;

readonly class SuccessChangePasswordEventHandler
{
    public function __construct() {}

    public function handle(ChangedPasswordEvent $event): void
    {

    }
}