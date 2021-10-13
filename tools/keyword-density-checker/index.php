<?php
set_include_path (get_include_path () . PATH_SEPARATOR . "../aaLbrr");
include_once "lbrr.php";

determineDiplaySizeToUse (); ?>

<!DOCTYPE html>
<head>
<title><?php echo fetchPrductName (); ?> || SEO Tools Collection || Keyword Density Checker
	</title>

<script type="text/javascript">
	function prcess () {
		document.getElementById ("inpt").style.border = "1mm solid #808080";
		document.getElementById ("kWrd").style.border = "1mm solid #808080";
	
		//|| CNTENT ||
		var prcssdContent;
		prcssdContent = document.getElementById ("inpt").value;

		prcssdContent.trim ();

		if (prcssdContent.length == 0) {
			var kyword;
			kyword = document.getElementById ("kWrd").value;
			kyword = kyword.trim ();
			if (kyword.length > 0) {
				document.getElementById ("inpt").style.border = "2mm solid #ff0000";
				return;
			}

			return;
		}

		prcssdContent = prcssdContent + " ";

		var _yeld1 = prcssdContent.replace (/\s{2,}/g, " ");
		prcssdContent = _yeld1;
		
		//|| KYWORD ||		
		var prcssdKyword;
		prcssdKyword = document.getElementById ("kWrd").value;

		prcssdKyword.trim ();

		if (prcssdKyword.length == 0) {
			document.getElementById ("kWrd").style.border = "2mm solid #ff0000";
			return;
		}

		prcssdKyword = prcssdKyword + " ";

		var _yeld3 = prcssdKyword.replace (/\s{2,}/g, " ");
		prcssdKyword = _yeld3;

		if (! /^[a-zA-Z0-9]+(\-[a-zA-Z0-9]+)* ([a-zA-Z0-9]+(\-[a-zA-Z0-9]+)* )*$/gm.test
			(prcssdKyword)) {
			document.getElementById ("kWrd").style.border = "2mm solid #ff0000";
			return;
		}

		//|| CLCLTE ||
		var _yeld4 = prcssdContent.split (" ");
		var cntntsCrdnlt;
		cntntsCrdnlt = _yeld4.length - 1;

		var occrnc;
		occrnc = 0;
		var pttern;
		var kywordPttern;
		kywordPttern = prcssdKyword.replace (/\-/g, "\\-");
		pttern = new RegExp (kywordPttern, "g");
		while (pttern.test (prcssdContent)) {
			occrnc = occrnc + 1;
		}
		
		var _yeld5 = prcssdKyword.split (" ");
		cntntsCrdnlt = cntntsCrdnlt - (occrnc * (_yeld5.length - 2));

		var dnsity;
		dnsity = (occrnc / cntntsCrdnlt) * 100;
		dnsity = dnsity.toFixed (2);

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
		document.getElementById ("inpt").style.border = "1mm solid #808080";
		document.getElementById ("kWrd").style.border = "1mm solid #808080";

		document.getElementById ("inpt").value = "";
		document.getElementById ("kWrd").value = "";
		
		document.getElementById ("whle").innerHTML =  "00";
		document.getElementById ("dcml").innerHTML = ".00"; }
		
	</script>
		
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprStylngCode (); ?>" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprPrsnalStylngCode (); ?>" /> </head>

<body><div id="body">
	<?php echo gnrateHeader (fetchPrductId () . "/tools", "Keyword Density Checker"); ?>

	<div id="cntn">
		<div id="note">Stop! You do not have to count all the words in your article, to know
			the keyword density. Supply me the text and the keyword - I will do the
			calculation for you.</div>

		<div id="tool">
			<span id="sde1">
				<textarea id="inpt" name="text" placeholder="Put your text here."></textarea>
				<input id="kWrd" name="kWrd" type="text" placeholder="Enter you keyword here."/>
					</span>

			<span id="sde2">
				<span id="dnst"><span id="whle">00</span><span id="dcml">.00</span></span>
				<span id="keys">
					<button id="gooo" name="gooo" onclick="prcess ();">GO!  </button>
					<button id="clar" name="clar" onclick="clearX ();">CLEAR</button> </span>

					</span> </div> </div> </div> </body>
