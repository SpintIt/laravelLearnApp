<?php

namespace App\View\Components\Notification;

use App\Services\Notification\INotificationService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public INotificationService $notification;


    public function __construct(INotificationService $notificationService)
    {
        $this->notification = $notificationService;
    }

    public function render(): View|Closure|string
    {
        return view('components.notification.header');
    }
}
