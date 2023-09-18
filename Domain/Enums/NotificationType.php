<?php

namespace Domain\Enums;

enum NotificationType
{
    case Sms;
    case Email;
    case Telegram;
}