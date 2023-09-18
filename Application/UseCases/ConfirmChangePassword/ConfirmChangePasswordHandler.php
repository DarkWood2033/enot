<?php

namespace Application\UseCases\ConfirmChangePassword;

use Application\Contracts\IConfirmationRepository;
use Application\Exceptions\NotFoundException;

readonly class ConfirmChangePasswordHandler
{
    public function __construct(
        private IConfirmationRepository $confirmation_repository
    ) {}

    /**
     * @throws NotFoundException
     */
    public function handle(ConfirmChangePassword $command): bool
    {
        $confirmation = $this->confirmation_repository->getByRequest($command->session, $command->user_id);

        if ($confirmation == null) {
            throw new NotFoundException();
        }

        if ($confirmation->tryConfirm($command->code)) {
            $this->confirmation_repository->save($confirmation);
            return true;
        }

        return false;
    }
}