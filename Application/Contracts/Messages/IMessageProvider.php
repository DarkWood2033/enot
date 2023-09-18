<?php

namespace Application\Contracts\Messages;

interface IMessageProvider
{
    public function send(IMessage $message): void;
}