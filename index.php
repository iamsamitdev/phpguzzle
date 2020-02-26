<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
$client = new Client();

$response = $client->request( 'GET', 'http://localhost/stockrestapi/public/products', [
    'headers' => [
      'Authorization' => 'Basic YWRtaW46MTIzNA=='
    ]
  ] );

echo $response->getBody();