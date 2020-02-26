<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
$client = new Client();

/// อ่านไฟล์ csv
$csv_data = array();
$objCSV = fopen("csvfile/customer.csv", "r");
$i = 0;
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
    $i++;
    if($i > 1){
        $csv_data[] = $objArr[1];
    }
}

// print_r($csv_data);

$data_input = array(
  //  'id' => $csv_data[1][0],
    'province' => $csv_data[1]
);


// print_r($data_input);

fclose($objCSV);
// exit();

$response = $client->request( 'POST', 'http://localhost/stockrestapi/public/demo', [
    'headers' => [
      'Authorization' => 'Basic YWRtaW46MTIzNA==',
      'Content-Type'=> 'application/json',
    ],
    'body' => json_encode($data_input)
  ] );

echo $response->getBody();