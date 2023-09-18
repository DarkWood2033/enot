<?php

namespace Domain\Common;

abstract class Entity
{
    public int $id;
    private array $domain_events = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function getDomainEvents(): array
    {
        return $this->domain_events;
    }

    public function addDomainEvent(DomainEvent $domain_event): void
    {
        $this->domain_events[] = $domain_event;
    }

    public function clearDomainEvents(): void
    {
        $this->domain_events = [];
    }
}