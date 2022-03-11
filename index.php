<?php
$xyz = curl_init ();

curl_setopt ($xyz, CURLOPT_URL, "https://api.sendchamp.com/api/v1/sms/send");
curl_setopt ($xyz, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($xyz, CURLOPT_MAXREDIRS, 10);
curl_setopt ($xyz, CURLOPT_TIMEOUT, 30);
curl_setopt ($xyz, CURLOPT_POST, true);
$message = '{"to":["2348165149476"],"message":"Hello 01!","sender_name":"Sendchamp","route":"non_dnd"}';
curl_setopt ($xyz, CURLOPT_POSTFIELDS, $message);
curl_setopt ($xyz, CURLOPT_HTTPHEADER, array (
'Authorization: Bearer sendchamp_live_$2y$10$/9jD3gaUcMUiMyeREm1aM.PZdjfZCGeZTWOZLdrcFSzLijs6XNVBC',
'Content-Type: application/json',
'Accept: application/json'));
$response = curl_exec ($xyz);

$err = curl_error ($xyz);
curl_close ($xyz);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
