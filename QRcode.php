<?php
// Set the data to encode
$data = 'Raj#0';

// Set the QR code size
$size = 200;

// Set the Google Charts API URL
$url = 'https://chart.googleapis.com/chart?cht=qr&chs=' . $size . 'x' . $size . '&chl=' . urlencode($data);

// Output the QR code image
echo '<img src="' . $url . '" alt="QR Code">';
?>