<?php

namespace Tematech\Avstelecomsms;

use Illuminate\Notifications\Notification;

class AvsTelecomChannel
{
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->tosmsAvstelecon($notifiable);
        resolve(Avstelecomsms::class)->send($data['phone'], $data['message']);
    }
}
