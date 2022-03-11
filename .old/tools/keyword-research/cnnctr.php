<?php
set_include_path (get_include_path () . PATH_SEPARATOR . "../aaLbrr");
include_once "lbrr.php";

$locationId = fetchPrductId ();
$locationId = str_replace ("https", "http", $locationId);
$kyword = urlencode ($_GET ["kyword"]);
$qntity = urlencode ($_GET ["qntity"]);
$requestUrl = "{$locationId}:8001/?kyword={$kyword}&qntity={$qntity}";

$sssion = curl_init ();
curl_setopt ($sssion, CURLOPT_URL, $requestUrl);
curl_setopt ($sssion, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec ($sssion);

echo $result;
