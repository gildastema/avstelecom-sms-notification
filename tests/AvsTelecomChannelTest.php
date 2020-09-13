<?php

namespace Tematech\Avstelecomsms\Tests;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Tematech\Avstelecomsms\AvsTelecomChannel;
use Tematech\Avstelecomsms\AvstelecomsmsFacade;

class AvsTelecomChannelTest extends \Orchestra\Testbench\TestCase
{

    /**
     * Undocumented function
     * @test
     * @return void
     */
    public function notification_send()
    {
        $notification = new AvsTelecomNotificationTest;
        $notifiable = new AvsTelecomNotifiableTest;
        $channel = new AvsTelecomChannel();
        AvstelecomsmsFacade::shouldReceive('send')
                    ->andReturn(true);
        $channel->send($notifiable, $notification);
    }
}
class AvsTelecomNotifiableTest
{
    use Notifiable;

    public function routeNotificationForAvstelecom($notification)
    {
        return '237691131446';
    }
}

class AvsTelecomNotificationTest extends Notification
{

    public function toAvstelecom($notifiable)
    {
        return [
            'message' => 'cool!!!'
        ];
    }
}
