<?php

namespace Tematech\Avstelecomsms;

use Exception;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\GuzzleException;

class Avstelecomsms
{
    protected $client;

    public function __construct()
    {
        //
    }
    /**
     * Undocumented function
     *
     * @param string $phone E.164 2376XXXXXXX
     * @param string $message
     * @return bool
     */
    public function send(string $phone, string $message)
    {
        $timestamp = time();
        try {
            $response = Http::withOptions(['verify' => false])->post('https://avspayment.ufipay.cm:8090/bulksms', [
                'id'            => config('avstelecomsms.id'),
                'timestamp'     => $timestamp,
                'signature'     => hash_hmac('SHA1', config('avstelecomsms.token') . $timestamp, config('avstelecomsms.secret')),
                'phonenumber'   => $this->getPhone($phone),
                'sms'           => $message,
                'schedule'      => ''
            ]);
            $data = $response->json();

            if ($data['status'] != 200) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    private function getPhone(string $phone): string
    {
        if (strlen($phone) == 9)
            return '237' . $phone;
        return $phone;
    }
}
