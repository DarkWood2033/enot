<?php

namespace Application\Contracts;

interface ISessionGenerator
{
    public function generate(): string;
}