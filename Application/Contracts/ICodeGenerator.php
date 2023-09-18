<?php

namespace Application\Contracts;

use Domain\ValueObjects\Code;

interface ICodeGenerator
{
    public function generate(): Code;
}