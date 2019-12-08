<?php

namespace Tematech\Avstelecomsms;

use Illuminate\Notifications\Notification;

class AvsTelecomChannel
{
    public function send($notifiable, Notification $notification)
    {
        $phone = $notifiable->routeNotificationFor('avstelecom', $notification);
        $data = $notification->toAvstelecom($notifiable);
        resolve(Avstelecomsms::class)->send($this->getPhone($phone), $data['message']);
    }
    private function getPhone(string $phone)
    {
        if (strlen($phone) == 9)
            return '237' . $phone;
        return $phone;
    }
}
