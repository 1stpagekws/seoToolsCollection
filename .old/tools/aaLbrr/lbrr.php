<?php
include_once "Wa72/Url/Url.php";
use \Wa72\Url\Url;

function fetchPrductId () {
	return "http://192.168.43.117";
}

function fetchPrductName () {
	return "RealEstatEko";
}

function determineDiplaySizeToUse () {
	//--567890-B34567890-C34567890-D34567890-E34567890-F34567890-G34567890-H34567890-I34567890->
	// if desktop styling code is requested: make a record that future styling code to be used
	// should be desktop
	if (isset ($_GET ["dsplaySize"]) != true) {
		$_GET ["dsplaySize"] = "";
	}
	if (isset ($_COOKIE ["dsplaySize"]) != true) {
		$_COOKIE ["dsplaySize"] = "";
	}

	//|^^^^LEVEL 2^^^^|
	if ($_GET    ["dsplaySize"] == "mobile") {
		setcookie("dsplaySize",    "mobile", time () + (60 * 60 * 24 * 400), "/");
		$_COOKIE ["dsplaySize"]  = "mobile";

	} else if ($_GET ["dsplaySize"] == "dsktop") {
		setcookie("dsplaySize",    "dsktop", time () + (60 * 60 * 24 * 400), "/");
		$_COOKIE ["dsplaySize"]  = "dsktop";
	}
	//|====LEVEL 2====|

	//|^^^^LEVEL 2^^^^|
	if (($_GET ["dsplaySize"] != "mobile" && $_GET ["dsplaySize"] != "dsktop") &&
		$_COOKIE ["dsplaySize"] == "") {
		$deviceType = false;
		$deviceType = preg_match ("/(android|webos|avantgo|iphone|ipad|ipod|blackberry|" .
			"iemobile|bolt|boost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|" .
			"mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
			$_SERVER ["HTTP_USER_AGENT"]);

		if ($deviceType == true) {
			setcookie ("dsplaySize",   "mobile", time () + (60 * 60 * 24 * 400), "/");
			$_COOKIE  ["dsplaySize"] = "mobile";
		} else {
			setcookie ("dsplaySize",   "dsktop", time () + (60 * 60 * 24 * 400), "/");
			$_COOKIE  ["dsplaySize"] = "dsktop";
		}
	}
}
	//|====LEVEL 2====|

function prvideIdOfTheApprprStylngCode () {
	// create info "styling code to yield"
	$stylngCodeToYield = "";
	$stylngCodeToYield = fetchPrductId () . "/tools/xeMble.css";

	// if there is a record saying that the desktop styling code should be used, use the desktop
	// styling code
	if ($_COOKIE ["dsplaySize"] == "dsktop") {
		$stylngCodeToYield = fetchPrductId () . "/tools/xlDskt.css";
	}

	// yield styling info
	return $stylngCodeToYield;
}

function prvideIdOfTheApprprPrsnalStylngCode () {
	// create info "styling code to yield"
	$stylngCodeToYield = "";
	$stylngCodeToYield = "xnPMbl.css";

	// if there is a record saying that the desktop styling code should be used, use the desktop
	// styling code
	if ($_COOKIE ["dsplaySize"] == "dsktop") {
		$stylngCodeToYield = "xpPDsk.css";
	}

	// yield styling info
	return $stylngCodeToYield;
}

function gnrateHeader ($prvsIntrfcId, $label) {
	$prductId = "";
	$prductId = fetchPrductId ();
	$prductName = "";
	$prductName = fetchPrductName ();
	$iconId = "";
	$iconId = $prductId . "/tools/xtIcon.png";
	if ($_COOKIE ["dsplaySize"] == "dsktop") {
		$iconId = $prductId . "/tools/xtIcon.png";
	}
	$dsplaySizeChangeButton = "";
	$dsplaySizeChangeButton = gnrateDsplaySizeChangeButton ();

	return <<<BRDR
		<div id="hder">
			<span id="ttle">
				<a    id="icon" href="{$prductId}"><img src="{$iconId}" /></a>
				<a    id="text" href="{$prductId}">{$prductName}</a>
				<span id="aInt">{$label}</span> </span>
			<span id="bttn">
				<a id="prvs" href="{$prvsIntrfcId}">BACK</a>
				{$dsplaySizeChangeButton} </span> </div>

		<hr  id="line" />
		<hr  id="lne2" />

		
BRDR;
}

function gnrateDsplaySizeChangeButton () {
	$dsplaySizeChangeButton = "";
	$prsentIntrfcId = "";
	$prsentIntrfcId = Url::parse ($_SERVER ["REQUEST_URI"]);
	$prsentIntrfcId->setQueryParameter ("dsplaySize", "dsktop");
	$dsplaySizeChangeButton = "<a id='dSCB' href='{$prsentIntrfcId->write ()}'>DESKTOP</a>";

	if ($_COOKIE ["dsplaySize"] == "dsktop") {
		$prsentIntrfcId->setQueryParameter ("dsplaySize", "mobile");
		$dsplaySizeChangeButton = "<a id='dSCB' href='{$prsentIntrfcId->write ()}'>MOBILE</a>";
	}

	return $dsplaySizeChangeButton;
}
