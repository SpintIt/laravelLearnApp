<?php

namespace App\Services\Notification;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface INotificationService
{
    public function setSuccess(string $message): void;
    public function setError(string $message): void;
    public function showSuccess(): ?string;
    public function showError(): ?string;
}
