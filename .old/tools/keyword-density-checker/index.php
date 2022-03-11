<?php
set_include_path (get_include_path () . PATH_SEPARATOR . "../aaLbrr");
include_once "lbrr.php";

determineDiplaySizeToUse (); ?>

<!DOCTYPE html>
<head>
<title><?php echo fetchPrductName (); ?> || SEO Tools Collection || Keyword Density Checker
	</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprStylngCode (); ?>" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprPrsnalStylngCode (); ?>" />
<script type="text/javascript">

	function prcess () {
		document.getElementById ("inpt").style.borderColor = "#404040";
		document.getElementById ("kWrd").style.borderColor = "#404040";
	
		//|| CNTENT ||
		var prcssdContent;
		prcssdContent = document.getElementById ("inpt").value;

		prcssdContent.trim ();

		if (prcssdContent.length == 0) {
			var kyword;
			kyword = document.getElementById ("kWrd").value;
			kyword = kyword.trim ();
			if (kyword.length > 0) {
				document.getElementById ("inpt").style.borderColor = "#ff0000";
				return;
			}

			return;
		}

		var _yeld1 = prcssdContent.replace (/\s{2,}/g, " ");
		var _yeld2 = _yeld1.replace (/\./g, "");
		var _yeld3 = _yeld2.replace (/\?/g, "");
		var _yeld4 = _yeld3.replace (/!/g,  "");
		prcssdContent = _yeld4;

		prcssdContent = " " + prcssdContent + " ";
		//|| KYWORD ||		
		var prcssdKyword;
		prcssdKyword = document.getElementById ("kWrd").value;

		prcssdKyword.trim ();

		if (prcssdKyword.length == 0) {
			document.getElementById ("kWrd").style.borderColor = "#ff0000";
			return;
		}

		var _yeld3 = prcssdKyword.replace (/\s{2,}/g, " ");
		prcssdKyword = _yeld3;

		prcssdKyword = " " + prcssdKyword + " ";

		if (! /^ [a-zA-Z0-9]+(\-[a-zA-Z0-9]+)*( [a-zA-Z0-9]+(\-[a-zA-Z0-9]+)*)* $/gm.test
			(prcssdKyword)) {
			document.getElementById ("kWrd").style.borderColor = "#ff0000";
			return;
		}

		//|| CLCLTE ||
		var _yeld4 = prcssdContent.trim ().split (" ");
		var cntntsCrdnlt;
		cntntsCrdnlt = _yeld4.length;

		var occrnc;
		occrnc = 0;
		var pttern;
		var kywordPttern;
		kywordPttern = prcssdKyword.replace (/\-/gi, "\\-");
		kywordPttern = kywordPttern;
		pttern = new RegExp (kywordPttern, "gi");
		while (pttern.test (prcssdContent)) {
			occrnc = occrnc + 1;
		}
		//alert (occrnc);

		
		var _yeld5 = prcssdKyword.trim ().split (" ");
		cntntsCrdnlt = cntntsCrdnlt - (occrnc * (_yeld5.length - 1));
		//alert (cntntsCrdnlt);

		var dnsity;
		dnsity = (occrnc / cntntsCrdnlt) * 100;
		dnsity = dnsity.toFixed (2);
		//alert (dnsity);

		//|| RESULT ||
		var output;
		output = dnsity.toString ();
		var x = output.length;
		if (x == 4) {
			output = "0" + output;
		}

		document.getElementById ("whle").innerHTML = /^[0-9]{2,3}/.exec (output);
		document.getElementById ("dcml").innerHTML = "." + /[0-9]{2,2}$/.exec (output);
	}

	function clearX () {
		document.getElementById ("inpt").style.borderColor = "#404040";
		document.getElementById ("kWrd").style.borderColor = "#404040";

		document.getElementById ("inpt").value = "";
		document.getElementById ("kWrd").value = "";
		
		document.getElementById ("whle").innerHTML =  "--";
		document.getElementById ("dcml").innerHTML = ".--"; }
		
	</script> </head>

<body><div id="body">
	<?php echo gnrateHeader (fetchPrductId () . "/tools", "Keyword Density Checker"); ?>

	<div id="cntn">
		<div id="note">Google and other top search engines recommend having keyword densities
between 1 - 8 percent. Anything outside the range may result in a poor SEO rank. I help to
calculate keyword densities, thereby helping to improve SEO rankings on SERP.</div>

		<div id="tool">
			<span id="sde1">
				<textarea id="inpt" name="text" placeholder="Put your text here"></textarea>
				<input id="kWrd" name="kWrd" type="text" placeholder="Enter you keyword here"/>
					</span>

			<span id="sde2">
				<span id="dnst"><span id="whle">--</span><span id="dcml">.--</span></span>
				<span id="keys">
					<button id="gooo" name="gooo" onclick="prcess ();">GO!</button>
					<button id="clar" name="clar" onclick="clearX ();">CLEAR</button> </span>

					</span> </div> </div> </div> </body>
