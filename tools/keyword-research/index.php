<?php
set_include_path (get_include_path () . PATH_SEPARATOR . "../aaLbrr");
include_once "lbrr.php";

determineDiplaySizeToUse (); ?>

<!DOCTYPE html>
<head>
<title><?php echo fetchPrductName (); ?> || SEO Tools Collection || Keyword Research</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprStylngCode (); ?>" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprPrsnalStylngCode (); ?>" />
<script type="text/javascript">
	function prcess () {
		/*STEP 0:*/
		// change border colour

		/*STEP 1: disable button*/
		//document.getElementById ("m_go").disabled = false;
		//document.getElementById ("gooo").disabled = false;

		/*STEP 2: check if activity should really run */
		var kyword;
		var source;
		if (document.getElementById ("m_ky").value != "") {
			kyword = document.getElementById ("m_ky").value;
			kyword = kyword.trim ();
			if (kyword == "") {
				return;
			}
			source = "mobile";
		} else {
			kyword = document.getElementById ("kywr").value;
			kyword = kyword.trim ();
			if (kyword == "") {
				return;
			}
			source = "dsktop";
		}

		/*STEP 3: validate quantity */
		var qntity;
		if (source == "mobile") {
			qntity = document.getElementById ("m_qn").value;
		} else {
			qntity = document.getElementById ("qntt").value;
		}
		qntity = qntity.trim ();
		if (! /^[1-9]\d*$/.test (qntity)) {
			//change border colour
			return;
		}

		/*STEP 4: clear output */
		if (source == "mobile") {
			document.getElementById ("m_rs").value = "";
		} else {
			document.getElementById ("rslt").value = "";
		}

		/*STEP 5: process */
		var conn;
		conn = new XMLHttpRequest ();
		conn.onreadystatechange = function () {
			if (this.readyState == 4) {
				if (this.status != 200) {
					document.getElementById ("m_pr").value = 2;
					document.getElementById ("prgr").value = 2;

					document.getElementById ("m_pS").innerHTML = "Fatal error encountered. " +
						"Try again";
					document.getElementById ("pStt").innerHTML = "Fatal error encountered. " +
						"Try again";
					return;
				}

				outputs = this.responseText.split ("/")
				if (outputs [0] == "cErr") {
					document.getElementById ("m_pr").value = 2;
					document.getElementById ("prgr").value = 2;

					document.getElementById ("m_pS").innerHTML = "Server refused to help." +
						" We probably submitted an invalid data"
					document.getElementById ("pStt").innerHTML = "Server refused to help." +
						" We probably submitted an invalid data";
					return;
				} else if (outputs [0] == "dcln") {
					document.getElementById ("m_pr").value = 2;
					document.getElementById ("prgr").value = 2;

					document.getElementById ("m_pS").innerHTML = "Service has been used " +
						"enough for today. Try another service or come back tomorrow";
					document.getElementById ("pStt").innerHTML = "Service has been used " +
						"enough for today. Try another service or come back tomorrow";
					return;
				} else if (outputs [0] == "sErr") {
					document.getElementById ("m_pr").value = 2;
					document.getElementById ("prgr").value = 2;

					document.getElementById ("m_pS").innerHTML = "Server encountered an " +
						"error. Try again";
					document.getElementById ("pStt").innerHTML = "Server encountered an " +
						"error. Try again";
					return;
				} else if (outputs [0] == "sccs" && outputs.length == 1) {
					document.getElementById ("m_pr").value = 2;
					document.getElementById ("prgr").value = 2;

					document.getElementById ("m_pS").innerHTML = "Server could " +
						"not find similar top ranking keywords";
					document.getElementById ("pStt").innerHTML = "Server could " +
						"not find similar top ranking keywords";
					return;
				} else if (outputs [0] == "sccs") {
					document.getElementById ("m_pr").value = 2;
					document.getElementById ("prgr").value = 2;

					_x1 = parseInt (qntity);
					if ((outputs.length - 1) < _x1) {
						document.getElementById ("m_pS").innerHTML = "Completed successfully:" +
							" Server found just " + (outputs.length - 1).toString () +
							" keyword(s)";
						document.getElementById ("pStt").innerHTML = "Completed successfully:" +
							" Server found just " + (outputs.length - 1).toString () +
							" keyword(s)";
					} else {
						document.getElementById ("m_pS").innerHTML = "Completed successfully";
						document.getElementById ("pStt").innerHTML = "Completed successfully";
					}
					for (i = 2; i <= outputs.length; i ++) {
						if (i != 2) {
							if (source == "mobile") {
document.getElementById ("m_rs").value = document.getElementById ("m_rs").value + "\n";
							} else {
document.getElementById ("rslt").value = document.getElementById ("rslt").value + "\n";
							}
						}

						if (source == "mobile") {
document.getElementById ("m_rs").value = document.getElementById("m_rs").value + outputs[i - 1];
						} else{
document.getElementById ("rslt").value = document.getElementById("rslt").value + outputs[i - 1];
						}
					}
					return;
				} else {
					document.getElementById ("m_pr").value = 2;
					document.getElementById ("prgr").value = 2;

					document.getElementById ("m_pS").innerHTML = "Fatal error encountered. " +
						"Try again";
					document.getElementById ("pStt").innerHTML = "Fatal error encountered. " +
						"Try again";
					return;
				}
			}
		}
		conn.open ("GET", "/tools/keyword-research/cnnctr.php?kyword=" + encodeURI (kyword) +
			"&qntity=" + qntity, true)
		conn.send ();
		if (source == "mobile") {
			document.getElementById ("int1").style.display = "none";
			document.getElementById ("int2").style.display = "block";

			document.getElementById ("m_pr").value = 1;
			document.getElementById ("m_pS").innerHTML = "Hold on... Looking for related keywords...";
		} else {
			document.getElementById ("prgr").value = 1;
			document.getElementById ("pStt").innerHTML = "Hold on... Looking for related keywords...";
		}
	}

	function filter () {
		if (document.getElementById ("m_rs").value == "" &&
			document.getElementById ("rslt").value == "") {
			return;
		}

		var source;
		var kywrds;
		if (document.getElementById ("m_rs").value != "") {
			source = "mobile";
			kywrds = document.getElementById ("m_rs").value;
		} else {
			source = "dsktop";
			kywrds = document.getElementById ("rslt").value;
		}
		kywrds = kywrds.trim ();
		var surceB;
		surceB = new Array ();
		surceB = kywrds.split ("\n");

		var ngtive;
		if (source == "mobile") {
			ngtive = document.getElementById ("m_ng").value;
		} else {
			ngtive = document.getElementById ("ngtv").value;
		}
		ngtive = ngtive.trim ();
		if (ngtive != "") {
			var result;
			result = new Array ();

			_x0 = ngtive.toLowerCase ();
			_x0 = ngtive.replace (/[.*+?^${}()|[\]\\]/g, '\\$&');
			_x1 = RegExp (_x0);
			for (i = 1; i <= surceB.length; i ++) {
				if (_x1.test (surceB [i - 1]) == false) {
					result.push (surceB [i - 1]);
				}
			}

			surceB = result;
		}

		var pstive;
		if (source == "mobile") {
			pstive = document.getElementById ("m_ps").value;
		} else {
			pstive = document.getElementById ("pstv").value;
		}
		pstive = pstive.trim ();
		if (pstive != "") {
			var result;
			result = new Array ();

			_x0 = pstive.toLowerCase ();
			_x0 = pstive.replace (/[.*+?^${}()|[\]\\]/g, '\\$&');
			_x1 = RegExp (_x0);
			for (i = 1; i <= surceB.length; i ++) {
				if (_x1.test (surceB [i - 1]) == true) {
					result.push (surceB [i - 1]);
				}
			}

			surceB = result;
		}

		var output;
		output = surceB [0];
		for (i = 1; i <= surceB.length; i ++) {
			if (i == 1) {
				continue;
			}

			output = output + "\n" + surceB [i - 1];
		}
		if (source == "mobile") {
			document.getElementById ("m_rs").value = output;
		} else {
			document.getElementById ("rslt").value = output;
			document.getElementById ("rslt").value = output;
		}
	}

	function sleep (milliseconds) {
		const date = Date.now ();
		let currentDate = null;
		do {
			currentDate = Date.now ();
		} while ((currentDate - date) < milliseconds);
	}

	function copy () {
		if (document.getElementById ("m_rs").value.trim () == "" &&
			document.getElementById ("rslt").value.trim () == "") {
			return;
		}

		var source;
		if (document.getElementById ("m_rs").value.trim () != "") {
			source = "mobile";
		} else {
			source = "dsktop";
		}

		if (source == "mobile") {
			navigator.clipboard.writeText (document.getElementById ("m_rs").value);
			document.getElementById ("m_cp").innerHTML = "COPIED!";
			setTimeout (() => {document.getElementById ("m_cp").innerHTML = "COPY";}, 600);
		} else {
			navigator.clipboard.writeText (document.getElementById ("rslt").value);
			document.getElementById ("copy").innerHTML = "COPIED!";
			setTimeout (() => {document.getElementById ("copy").innerHTML = "COPY";}, 600);
		}
	}

	function back () {
		document.getElementById ("int1").style.display = "block";
		document.getElementById ("int2").style.display = "none";
	}

</script> </head>
<body><div id="body">
	<?php echo gnrateHeader (fetchPrductId () . "/tools", "Keyword Research"); ?>

	<div id="cntn">
		<div id="note">When you have a topic keyword, knowing what similar keywords rank high,
helps to create better SEO contents. Tell me your topic keyword and how many similar top
keywords you want. I will fetch them for you.</div>

		<div id="dskt">
			<div id="sde1">
				<span   id="inpt"><input  id="kywr" type="text" placeholder="KEYWORD" />
				<!--C--><input id="qntt" type="text" placeholder="QUANTITY" value="250" hidden /></span>
				<button id="gooo" type="submit" onclick="prcess ()">GO</button>
				<span   id="fltr">
					<span id="ttle">FILTER</span>
					<span id="fInp"><input id="ngtv" type="text" placeholder="negative filter"/>
					<!--C--><input id="pstv" type="text" placeholder="positive filter" /></span>
					<button id="fBtt" type="submit" onclick="filter ()">FILTER</button></span></div>

			<div id="sde2">
				<progress id="prgr" max="2" value="0"></progress>
				<p        id="pStt">...</p>
				<textarea id="rslt" placeholder="RESULT WILL BE DISPLAYED HERE" disabled></textarea>
				<button   id="copy" type="submit" onclick="copy ()">COPY</button></div>

			</div>

		<div id="mble">
			<div id="int1">
				<span   id="m_in"><input  id="m_ky" type="text" placeholder="Keyword" />
				<!--C--><input id="m_qn" type="text" placeholder="Quantity" value="250" hidden /></span>
				<button id="m_go" type="submit" onclick="prcess ()">GO</button></div>
			<div id="int2">
				<progress id="m_pr" max="2" value="0"> </progress>
				<p        id="m_pS">...</p>
				<textarea id="m_rs" placeholder="RESULT WILL BE DISPLAYED HERE" disabled></textarea>
				<span     id="m_bt"><button id="m_bc" type="submit" onclick="back ()">BACK</button>
				<!--C--><button id="m_cp" type="submit" onclick="copy ()">COPY</button></span>

				<span     id="m_fl">
					<span   id="m_tt">FILTER</span>
					<span   id="m_fI"><input id="m_ng" type="text" placeholder="Negative filter"/>
					<!--C--><input id="m_ps" type="text" placeholder="Positive filter" /></span>
					<button id="m_fB" type="submit" onclick="filter ()">FILTER</button></span></div>

			</div>

		</div>
	</div></body></html>
