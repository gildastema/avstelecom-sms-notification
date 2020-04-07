<?php


namespace Tematech\Avstelecomsms\Tests;

use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase;
use Tematech\Avstelecomsms\Avstelecomsms;
use Tematech\Avstelecomsms\AvstelecomsmsFacade;

class AvsTelecomTest extends TestCase
{
    /**
     * @test
     */
    public function send_ok()
    {
        $response = Http::fake([
            'http://54.37.231.5:8090/bulksms' => Http::response(['status' => 200])
        ]);
        $this->assertTrue( resolve(Avstelecomsms::class)->send('678986466', 'cool') );
        $this->assertTrue(AvstelecomsmsFacade::send('237691131446', 'cool'));
    }

    /**
     * @test
     */
    public function sendfailed()
    {
        $response = Http::fake([
            'http://54.37.231.5:8090/bulksms' => Http::response(['status' => 400])
        ]);
        $this->assertFalse( resolve(Avstelecomsms::class)->send('678986466', 'cool') );
        $this->assertFalse(AvstelecomsmsFacade::send('237691131446', 'cool'));
    }
}
