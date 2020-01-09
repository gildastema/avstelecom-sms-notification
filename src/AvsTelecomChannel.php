<?php

namespace Tematech\Avstelecomsms;

use Illuminate\Notifications\Notification;

class AvsTelecomChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (!$phone = $notifiable->routeNotificationFor('avstelecom', $notification)) {
            return;
        }
        $data = $notification->toAvstelecom($notifiable);
        AvstelecomsmsFacade::send($this->getPhone($phone), $data['message']);
    }
    private function getPhone(string $phone)
    {
        if (strlen($phone) == 9)
            return '237' . $phone;
        return $phone;
    }
}
