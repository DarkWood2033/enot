<?php

namespace Application\Contracts;

use Domain\Entities\User;

interface IUserRepository
{
    public function findById(int $id): User;
}