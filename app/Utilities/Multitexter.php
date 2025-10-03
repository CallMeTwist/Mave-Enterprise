<?php

namespace App\Utilities;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;

class Multitexter
{
    /**
     * SMS Config
     */
    private const config = [
        'multitexter' => [
            'email' => 'eobinna.ophelconsulting@gmail.com',
            'password' => 'Esoteric21',
            'sender_name' => 'TPTC',
            'force_dnd' => 1
        ]
    ];

    /**
     * @param $array
     * @return bool
     */
    public function send($array)
    {
        $data = [
            "email" => self::config['multitexter']['email'],
            "password" => self::config['multitexter']['password'],
            "message" => $array['message'],
            "sender_name" => self::config['multitexter']['sender_name'],
            "recipients" => substr_replace($array['mobile'], '234', 0,1),
            "forcednd" => self::config['multitexter']['forcednd']
        ];

        $data_string = json_encode($data);

        $ch = curl_init('https://app.multitexter.com/v2/app/sms');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ]);
        $result = curl_exec($ch);
        $response = json_decode($result, true);

        if($response['status'] === 1){
            return true;
        }

        Log::critical('SMS sending failed due to :'. config('multitexter')[$response['status']]);
        return false;
    }

    public function balance()
    {
        $client = new Client();
        $body = '{
            "email" : "eobinna.ophelconsulting@gmail.com",
            "password" : "Esoteric21",
            "format" : true
        }';
        $request = new Request('POST', 'https://app.multitexter.com/v2/app/getbalance', [], $body);
        $res = $client->sendAsync($request)->wait();
        echo $res->getBody();

    }
}
