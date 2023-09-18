<?php

namespace WebApi\Controllers;

use Application\UseCases\ConfirmChangePassword\ConfirmChangePassword;
use Application\UseCases\ConfirmChangePassword\ConfirmChangePasswordHandler;
use Application\UseCases\RequestChangePassword\RequestChangePassword;
use Application\UseCases\RequestChangePassword\RequestChangePasswordHandler;
use WebApi\Contracts\IAuthorizedUser;
use WebApi\Requests\ConfirmChangePasswordRequest;
use WebApi\Requests\RequestChangePasswordRequest;
use WebApi\ViewModels\MessageViewModel;
use WebApi\ViewModels\SessionViewModel;

class ChangePasswordController
{
    public function __construct(
        public IAuthorizedUser $authorizedUser
    ) {}

    public function requestChangePassword(RequestChangePasswordRequest $request, RequestChangePasswordHandler $handler): SessionViewModel
    {
        $command = new RequestChangePassword(
            $this->authorizedUser->getId(),
            $request->password,
            $request->type
        );

        $result = $handler->handle($command);

        return new SessionViewModel($result);
    }

    public function confirmChangePassword(ConfirmChangePasswordRequest $request, ConfirmChangePasswordHandler $handler)
    {
        $command = new ConfirmChangePassword(
            $this->authorizedUser->getId(),
            $request->session,
            $request->session
        );

        $result = $handler->handle($command);

        if ($result) {
            return new MessageViewModel('Вы успешно узменили пароль!');
        }
        return new MessageViewModel('Введенный код не валиден!');
    }
}