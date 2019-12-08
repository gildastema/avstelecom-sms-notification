<?php

namespace Tematech\Avstelecomsms\Tests;

use Mockery;
use Illuminate\Notifications\Notifiable;
use Tematech\Avstelecomsms\Avstelecomsms;
use Illuminate\Notifications\Notification;
use Tematech\Avstelecomsms\AvsTelecomChannel;

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
        $this->instance(Avstelecomsms::class , Mockery::mock(Avstelecomsms::class , function ($mock){
            $mock->shouldReceive('send')
                ->andReturn(true);
        }));
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
