<?php

namespace Domain\Entities;

use Domain\Common\Entity;
use Domain\Enums\NotificationType;
use Domain\Events\SentRequestToChangePasswordEvent;
use Domain\ValueObjects\Code;

class Confirmation extends Entity
{
    private User $user;
    private Code $code;
    private NotificationType $type;
    private bool $is_used;
    private string $session;
    private string $password_hash;

    public function __construct(User $user, Code $code, NotificationType $type, string $session, string $password_hash)
    {
        $this->user = $user;
        $this->code = $code;
        $this->type = $type;
        $this->is_used = false;
        $this->session = $session;
        $this->password_hash = $password_hash;
        $this->addDomainEvent(new SentRequestToChangePasswordEvent($this));
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getCode(): Code
    {
        return $this->code;
    }

    public function getType(): NotificationType
    {
        return $this->type;
    }

    public function getSession(): string
    {
        return $this->session;
    }

    public function tryConfirm(string $code): bool
    {
        if (!$this->is_used && $this->code->check($code)) {
            $this->is_used = true;
            $this->user->setPasswordHash($this->password_hash);
            return true;
        }
        return false;
    }
}