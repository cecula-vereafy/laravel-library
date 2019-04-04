<?php 
require 'vendor/autoload.php';
use Illuminate\Guzzlehttp\guzzle;
use GuzzleHttp\Client;    // Initialize Guzzle client
use GuzzleHttp\Psr7\Request;



$client = new \GuzzleHttp\Client();

$method = 'GET';
$url = 'https://api.cecula.com/account/tfabalance';
$header = Array(
    'Content-Type' => 'application/json',
    'authorization' => 'Bearer CCL.7fEAQVxBm2BJ-z8.7IODT8geppFjDRV6f2lTDcPa'
);
$body = Array( 
    'pinRef' => '1293488527',
    'mobile' => '2347087828631'

);


$response = $client->request($method, $url, [
    'headers'        => $header,
]);

    echo $response->getBody();