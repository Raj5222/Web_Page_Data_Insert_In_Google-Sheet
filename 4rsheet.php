<?php

require_once 'Googel-Sheet-Api/vendor/autoload.php'; // include the Google API PHP client library


$client = new Google_Client();
$client->setApplicationName('SPCE-Dev-Ragistration');
$client->setAuthConfig('spcedev-key.json');
$client->addScope(Google_Service_Sheets::SPREADSHEETS);

$service = new Google_Service_Sheets($client);

$spreadsheetId = '1vw-yLt_5HqSeKDCebHeTVOCWNf1AzaFDv_-idyamzx4';
$range = 'Sheet1';

$values = [
    ['Raj', 'Sathavara', 'raj.sathavara122@gmail.com']];

$body = new Google_Service_Sheets_ValueRange([
    'values' => $values,
]);

$params = [
    'valueInputOption' => 'USER_ENTERED',
];

$result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

printf("Your Ragistration Successful.");
?>