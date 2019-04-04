<?php 
require 'vendor/autoload.php'; //Require php autoload
use Illuminate\Guzzlehttp\guzzle;
use GuzzleHttp\Client;    // Initialize Guzzle client
use GuzzleHttp\Psr7\Request;
GuzzleHttp\RequestOptions::DEBUG;


$client = new \GuzzleHttp\Client();

$method = 'GET';
$url = 'https://api.cecula.com/account/tfabalance';
$header = Array(
    'Content-Type' => 'application/json',
    'authorization' => 'Bearer' //Paste your key here
);

// Handling request
$response = $client->request($method, $url, [
    'headers'        => $header,
]);

    echo $response->getBody();