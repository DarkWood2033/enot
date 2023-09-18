<?php

namespace Application\Contracts;

interface IHashService
{
    public function hash(string $text): string;
}