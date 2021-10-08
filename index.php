<?php
//--567890-B34567890-C34567890-D34567890-E34567890-F34567890-G34567890-H34567890-I34567890-J--->
// if desktop styling code is requested: make a record that future styling code to be used
// should be desktop
if (isset ($_GET ["dsplaySize"]) != true) {
	$_GET ["dsplaySize"] = ""; }
if (isset ($_COOKIE ["dsplaySize"]) != true) {
	$_COOKIE ["dsplaySize"] = ""; }

//|^^^^LEVEL 1^^^^|
//|^^^^LEVEL 2^^^^|
if ($_GET    ["dsplaySize"] == "mobile") {
	setcookie("dsplaySize",    "mobile", time () + (60 * 60 * 24 * 400));
	$_COOKIE ["dsplaySize"]  = "mobile";

} else if ($_GET ["dsplaySize"] == "dsktop") {
	setcookie("dsplaySize",    "dsktop", time () + (60 * 60 * 24 * 400));
	$_COOKIE ["dsplaySize"]  = "dsktop"; }
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
		setcookie ("dsplaySize",   "mobile", time () + (60 * 60 * 24 * 400));
		$_COOKIE  ["dsplaySize"] = "mobile";
	} else {
		setcookie ("dsplaySize",   "dsktop", time () + (60 * 60 * 24 * 400));
		$_COOKIE  ["dsplaySize"] = "dsktop"; } }
//|====LEVEL 2====|
//|====LEVEL 1====|

function gnrateStylngCode () {
	// create info "styling code to yield"
	$stylngCodeToYield = "";
	$stylngCodeToYield = "zMbile.css";

	// if there is a record saying that the desktop styling code should be used, use the desktop
	// styling code
	if ($_COOKIE ["dsplaySize"] == "dsktop") {
		$stylngCodeToYield = "zDsktp.css"; }

	// yield styling info
	return $stylngCodeToYield; }

function getAltrntDsplaySizeButton () {
	$altrntDsplaySizeButton = "";
	$altrntDsplaySizeButton = "<a id='dsplaySizeButton' href='index.php?" .  
	"dsplaySize=dsktop'>Desktop</a>";

	if ($_COOKIE ["dsplaySize"] == "dsktop") {
		$altrntDsplaySizeButton = "<a id='dsplaySizeButton' href='index.php?" . 
		"dsplaySize=mobile'>Mobile</a>"; }

	return $altrntDsplaySizeButton; } ?>

<!DOCTYPE html>
<!--567890-B34567890-C34567890-D34567890-E34567890-F34567890-G34567890-H34567890-I34567890-J--->
<head>
<title>RealEstatEko || SEO Tools Section || SEO-optimized HTML Anchor Code Generator</title>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" href="<?php echo gnrateStylngCode (); ?>" />

<script type="text/javascript">
	function assistPrcess () {
		var sccessStatus;
		sccessStatus = "0";
		var output;
		output = "";

		//|^^^^level 2^^^^
		//|^^^^level 3^^^^
		var lnks;
		lnks = document.getElementById ("cntn_sde1_txt1").value;

		var nmes;
		nmes = document.getElementById ("cntn_sde1_txt2").value;

		var noOfLinksPrcssdSoFar;
		noOfLinksPrcssdSoFar = 0;

		var idOfNextLnksCharToCnsder;
		idOfNextLnksCharToCnsder = 1;

		var idOfNextNmesCharToCnsder;
		idOfNextNmesCharToCnsder = 1;

		var newLinkAvlbltStatus;
		newLinkAvlbltStatus = false;
		var newLink;
		newLink = "";

		var newNameAvlbltStatus;
		newNameAvlbltStatus = false;
		var newName;
		newName = "";
		//|====level 3====

		//|^^^^level 3^^^^
		while (true) {
			while (true) {
				if (idOfNextLnksCharToCnsder > lnks.length) {
					break; }
				idOfNextLnksCharToCnsder = idOfNextLnksCharToCnsder + 1;
				if (lnks [idOfNextLnksCharToCnsder - 2] == "\n") {
					break; }
				newLink = newLink + lnks [idOfNextLnksCharToCnsder - 2];
				if (!newLinkAvlbltStatus) {
					newLinkAvlbltStatus = true; } }
			newLink = newLink.trim ();

			while (true) {
				if (idOfNextNmesCharToCnsder > nmes.length) {
					break; }
				idOfNextNmesCharToCnsder = idOfNextNmesCharToCnsder + 1;
				if (nmes [idOfNextNmesCharToCnsder - 2] == "\n") {
					break; }
				newName = newName + nmes [idOfNextNmesCharToCnsder - 2];
				if (newNameAvlbltStatus == false) {
					newNameAvlbltStatus = true; } }
		
			if (!newLinkAvlbltStatus && !newNameAvlbltStatus) {
				break; }

			if (!newLinkAvlbltStatus) {
				output = "ERROR: There is no link at position " + (noOfLinksPrcssdSoFar + 1) + 
					", so why is a name at position " + (noOfLinksPrcssdSoFar + 1);

				var yield;
				yield = new Array ();
				yield [0] = sccessStatus;
				yield [1] = output;

				return yield; }

			if (!newNameAvlbltStatus && (newName.trim () != "")) {
				output = "ERROR: The link at position " + (noOfLinksPrcssdSoFar + 1) + 
				" has no corresponding name";

				var yield;
				yield = new Array ();
				yield [0] = sccessStatus;
				yield [1] = output;

				return yield; }

			if (noOfLinksPrcssdSoFar == 1000) {
				output = "ERROR: There are over 1,000 links. Max allowed is 1,000";

				var yield;
				yield = new Array ();
				yield [0] = sccessStatus;
				yield [1] = output;

				return yield; }
			noOfLinksPrcssdSoFar = noOfLinksPrcssdSoFar + 1;

			var validLinkPttern;
			validLinkPttern = /^(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)$/gm;
			if (!validLinkPttern.test (newLink)) {
				output = "ERROR: The link at position " + (noOfLinksPrcssdSoFar) + 
				" is invalid";

				var yield;
				yield = new Array ();
				yield [0] = sccessStatus;
				yield [1] = output;

				return yield; }

			if (newName.trim () == "") {
				output = "ERROR: The name at position " + (noOfLinksPrcssdSoFar) + 
				" is invalid";

				var yield;
				yield = new Array ();
				yield [0] = sccessStatus;
				yield [1] = output;

				return yield; }

			var code;
			code = "<a href='" + newLink + "' title='" + newName.trim () + "'";
			if (document.querySelector('input[name="ntre"]:checked').value == "Yes") {
				code = code + " target='_blank'"; }
			code = code + ">" + newName + "</a>";

			output = output + code + "\n";

			newLinkAvlbltStatus = false;
			newLink = "";
			newNameAvlbltStatus = false;
			newName = ""; }

		var yield;
		yield = new Array ();
		yield [0] = "1";
		yield [1] = output;
		return yield; }

	function prcess () {
	    var result;
	    result = assistPrcess ();
		document.getElementById ("cntn_sde2_itm1").value = result [1];
		document.getElementById ("cntn_sde2_itm1").scrollIntoView (); }

	function clearF () {
		document.getElementById ("cntn_sde1_txt1").value = "";
		document.getElementById ("cntn_sde1_txt2").value = "";
		document.getElementById ("cntn_sde2_itm1").value = ""; } </script> </head>

<body>
<div id="menu">
	<div id="menu_prt1"><a href="https://realestateko.com"><< HOME</a></div>

	<div id="menu_prt2">
	    <div id="menu_prt2_itm1">
    	<!--C--><span id="txt1">SEO Tools Section</span>
	    <!--C--><span id="txt2"> || </span>
    	<!--C--><span id="txt3">SEO-optimized HTML Anchor Code Generator</span> </div>

    	<div id="menu_prt2_itm2"><?php echo getAltrntDsplaySizeButton (); ?></div> </div> </div>

<hr />

<div id="dscr">Hey there. I am Stephanie - I am your anchor text generator assistant. I will
help you navigate the hassle of generating the perfect anchor text for your project. Google
wants good SEO anchor codes. I can help you generate them, thereby improving your SEO
rankings on SERP.</div>

<div id="cntn">
    <div id="cntn_sde1">
        <textarea id="cntn_sde1_txt1" name="link" placeholder="Enter your link;
You may enter additional links under the first
[1 link per line; 1,000 links max]."
		></textarea> <br />

        <textarea id="cntn_sde1_txt2" name="name" placeholder="Enter link's name;
If there are additional links, enter their corresponding names
[1 name per line; 1,000 names max]."
		></textarea> <br />

        <span id="cntn_sde1_itm3">
        <!--C--><span id="tkn1">When clicked, should the link open in a new tab?</span> <br />
        <!--C-->NO:  <input id="opt1" type="radio" name="ntre" value="No" checked />
        <!--C--><span id="tkn3"></span> 
        <!--C-->YES: <input id="opt2" type="radio" name="ntre" value="Yes" /> </span> </div>

    <div id="cntn_sde2">
		<span id="cntn_sde2_itm0">— RESULT —</span>

		<textarea id="cntn_sde2_itm1" name="otpt" placeholder="I WILL POST MY ERROR OR RESULT HERE."
        disabled></textarea> <br />

        <span id="cntn_sde2_itm2">
        <!--C--><button id="btn1" type="button" onclick="clearF ()">CLEAR</button>
        <!--C--><button id="btn2" type="button" onclick="prcess ()">GENERATE</button> </span>
        <!--C--></div> </div> </body> </html>
