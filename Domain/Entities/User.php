<?php

namespace Domain\Entities;

use Domain\Common\Entity;
use Domain\Events\ChangedPasswordEvent;

class User extends Entity
{
    private string $username;
    private string $email;
    private string $phone;
    private string $telegram;
    private string $password_hash;

    public function __constructor(string $username, string $email, string $phone, string $telegram, string $password_hash): void
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->telegram = $telegram;
        $this->password_hash = $password_hash;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getTelegram(): string
    {
        return $this->telegram;
    }

    public function getPasswordHash(): string
    {
        return $this->password_hash;
    }

    public function setPasswordHash(string $password_hash): self
    {
        $this->password_hash = $password_hash;
        $this->addDomainEvent(new ChangedPasswordEvent($this));
        return $this;
    }
}