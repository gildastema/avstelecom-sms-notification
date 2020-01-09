<?php


namespace Tematech\Avstelecomsms\Tests;


use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Orchestra\Testbench\TestCase;
use Tematech\Avstelecomsms\AvstelecomsmsFacade;

class AvsTelecomTest extends TestCase
{
    /**
     * @test
     */
    public function send_ok()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'],\GuzzleHttp\json_encode( ['status' => 200])),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $this->app->singleton(Client::class, function () use($client) {
            return $client;
        });
       $this->assertTrue(AvstelecomsmsFacade::send('237691131446', 'cool'));
    }

    /**
     * @test
     */
    public function sendfailed()
    {
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'],\GuzzleHttp\json_encode( ['status' => 401])),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $this->app->singleton(Client::class, function () use($client) {
            return $client;
        });
        $this->assertFalse(AvstelecomsmsFacade::send('237691131446', 'cool'));
    }
}
