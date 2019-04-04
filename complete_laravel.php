<?php 
require 'vendor/autoload.php'; //Require php autoload
use Illuminate\Guzzlehttp\guzzle;
use GuzzleHttp\Client;    // Initialize Guzzle client
use GuzzleHttp\Psr7\Request;

$client = new \GuzzleHttp\Client();

$method = 'POST';
$url = 'https://api.cecula.com/twofactor/complete';
$header = Array(
    'Content-Type' => 'application/json',
    'authorization' => 'Bearer' // Paste your key here
);
$body = Array( 
    'pinRef' => '',
    'token' => ''
);

// Handling request
$response = $client->request($method, $url, [
    'headers'        => $header,
    'json'  => $body,
]);

    echo $response->getBody();