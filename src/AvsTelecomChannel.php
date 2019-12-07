<?php

namespace Tematech\Avstelecomsms;

use Illuminate\Notifications\Notification;

class AvsTelecomChannel
{
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toavstelecom($notifiable);
        resolve(Avstelecomsms::class)->send($data['phone'], $data['message']);
    }
}
