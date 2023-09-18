<?php

namespace Application\Contracts\Messages;

interface IMessage
{
    public function getText(): string;
}