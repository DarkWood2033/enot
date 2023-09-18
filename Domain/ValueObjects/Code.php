<?php

namespace Domain\ValueObjects;

use DateTime;
use Domain\Common\ValueObject;

readonly class Code extends ValueObject
{
    public function __construct(
        public string $code,
        public DateTime $active_at
    ) {}

    public function check($code): bool
    {
        if ($this->active_at < new DateTime()) {
            return false;
        }

        return $this->code == $code;
    }
}