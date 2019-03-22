<?php
/**
 * How to use this library
 * first download the library into your project directory
 * then composer install to install all dependencies
 * Call any of the function you want to use in your file and put in the parameters and a callabck function
 * The parameters are passed as dataObj and are inputed in a JSON format /({"mobile":"23470xxxxxx"})/
 * 
 */
require 'vendor/autoload.php';
use Illuminate\Guzzlehttp\guzzle;
use GuzzleHttp\Client;    // Initialize Guzzle client
use GuzzleHttp\Psr7\Request;

class vereafyController
{

private $url = 'https://api.cecula.com';
private $header = [];
private $key = null;
public function generate($apiKey){
    $this->$key = $apiKey;
    $this->$header = [
    'Content-Type' => 'application/json',
    'authorization' => 'Bearer + {$this->$key}',
    "cache-control: no-cache"
    ];
}
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function initial($mobile)
    {
        $data = [
            'mobile' => $mobile
        ];
        return $this->sendPostRequest('twofactor/init',$data);
    }

    public function resend($pinRef, $mobile)
    {
        $data = [
            'pinRef' => $pinRef,
            'mobile' => $mobile
        ];
        return $this->sendPostRequest('twofactor/resend',$data);
    }

    public function complete($pinRef, $token)
    {
        $data = [
            'pinRef' => $pinRef,
            'token' => $token
        ];
        return $this->sendPostRequest('twofactor/complete',$data);
    }

    public function balance()
    {
        return $this->getRequest('account/tfabalance');
    }

    private function sendPostRequest($url, $header, $data){
        $response = $client->request('POST', $url, [
            // 'debug' => true,
            'headers'        => $this->$header,
            'json'  => $data,
        ]);
        $response->getBody();
    }

}