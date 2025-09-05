<?php

namespace App\Services\Notification;

class NotificationService implements INotificationService
{
    const SUCCESS = 'success';
    const ERROR = 'error';

    public function setSuccess(string $message): void
    {
        session([self::SUCCESS => $message]);
    }

    public function setError(string $message): void
    {
        session([self::ERROR => $message]);
    }

    public function showSuccess(): ?string
    {
        return session()->pull(self::SUCCESS);
    }

    public function showError(): ?string
    {
        return session()->pull(self::ERROR);
    }
}
