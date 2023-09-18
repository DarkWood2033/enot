<?php

namespace Application\UseCases\RequestChangePassword;

use Application\Contracts\ICodeGenerator;
use Application\Contracts\IConfirmationRepository;
use Application\Contracts\IHashService;
use Application\Contracts\ISessionGenerator;
use Application\Contracts\IUserRepository;
use Domain\Entities\Confirmation;

readonly class RequestChangePasswordHandler
{
    public function __construct(
        private IUserRepository $user_repository,
        private ICodeGenerator $code_generator,
        private IConfirmationRepository $confirmation_repository,
        private ISessionGenerator $session_generator,
        private IHashService $hash_service
    ) {}

    public function handle(RequestChangePassword $command): string
    {
        $user = $this->user_repository->findById($command->user_id);
        $code = $this->code_generator->generate();
        $notification_type = $command->notification_type;
        $session = $this->session_generator->generate();
        $password_hash = $this->hash_service->hash($command->password);
        $confirmation = new Confirmation($user, $code, $notification_type, $session, $password_hash);
        $this->confirmation_repository->save($confirmation);
        return $session;
    }
}