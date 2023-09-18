<?php

namespace Application\Contracts;

use Domain\Entities\Confirmation;

interface IConfirmationRepository
{
    public function save(Confirmation $confirmation): void;
    public function getByRequest(string $session, int $user_id): ?Confirmation;
}