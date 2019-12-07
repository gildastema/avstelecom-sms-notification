<?php

namespace Tematech\Avstelecomsms;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Avstelecomsms
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function send(string $phone, string $message)
    {
        $timestamp = time();
        try {
            $response =  $this->client->request('POST', 'http://54.37.231.5:8090/bulksms', [
                'json' => [
                    'id'            => config('avstelecomsms.id'),
                    'timestamp'     => $timestamp,
                    'signature'     => hash_hmac('SHA1', config('avstelecomsms.token') . $timestamp, config('avstelecomsms.secret')),
                    'phonenumber'   => $phone,
                    'sms'           => $message,
                    'schedule'      => ''
                ]
            ]);
            $data =  $response->getBody();
            $data = json_decode($data, true);
            if ((int) $data['status'] !== 200) {
                return false;
            }
            return true;
        } catch (GuzzleException $e) {
            return false;
        }
    }
}
