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
		document.getElementById ("m_go").disabled = false;
		document.getElementById ("gooo").disabled = false;

		/*STEP 2: check if activity should really run */
		var kyword;
		var source;
		if (document.getElementById ("m_ky").value != "") {
			kyword = document.getElementById ("m_ky").value;
			kyword = kyword.trim ();
			if (keyword == "") {
				return;
			}
			source = "mobile";
		} else {
			kyword = document.getElementById ("kywr").value;
			kyword = kyword.trim ();
			if (keyword == "") {
				return;
			}
			source = "dsktop";
		}

		/*STEP 3: validate quantity */
		var qntity;
		if (source == "mobile") {
			qntity = document.getElementId ("m_qn").value;
		} else {
			qntity = document.getElementId ("qntt").value;
		}
		qntity = qntity.trim ();
		if (! /^[1-9]\d*$/.test (qntity)) {
			//change border colour
			return;
		}

		/*STEP 4: clear output */
		document.getElementId ("m_rs").value = "";
		document.getElementId ("rslt").value = "";

		/*STEP 5: process */
		


</script> </head>

<body><div id="body">
	<?php echo gnrateHeader (fetchPrductId () . "/tools", "Keyword Research"); ?>

	<div id="cntn">
		<div id="note">Google and other top search engines recommend having keyword densities
between 1 - 8 percent. Anything outside the range may result in a poor SEO rank. I help to
calculate keyword densities, thereby helping to improve SEO rankings on SERP.</div>

		<div id="dskt">
			<div id="sde1">
				<span   id="inpt"><input  id="kywr" type="text" placeholder="Keyword" />
				<!--C--><input id="qntt" type="text" placeholder="Quantity" /></span>
				<button id="gooo" type="submit">GO</button>
				<span   id="fltr">
					<span id="ttle">FILTER</span>
					<span id="fInp"><input id="pstv" type="text" placeholder="Positive filter"/>
					<!--C--><input id="ngtv" type="text" placeholder="Negative filter" /></span>
					<button id="fBtt" type="submit">FILTER</button></span></div>

			<div id="sde2">
				<progress id="prgr" max="100" value="100"> </progress>
				<p        id="pStt">Connecting to the internet...</p>
				<textarea id="rslt" placeholder="RESULT WILL BE DISPLAYED HERE" disabled>
					</textarea>
				<button   id="copy" type="submit">COPY</button></div>

			</div>

		<div id="mble">
			<div id="int1">
				<span   id="m_in"><input  id="m_ky" type="text" placeholder="Keyword" />
				<!--C--><input id="m_qn" type="text" placeholder="Quantity" /></span>
				<button id="m_go" type="submit">Go</button></div>
			<div id="int2">
				<progress id="m_pr" max="100" value="100"> </progress>
				<p        id="m_pS">Connecting to the internet...</p>
				<textarea id="m_rs" placeholder="RESULT WILL BE DISPLAYED HERE" disabled>
					</textarea>
				<span     id="m_bt"><button id="m_bc" type="submit">BACK</button>
				<!--C--><button id="m_cp" type="submit">COPY</button></span>
				
				<span     id="m_fl">
					<span   id="m_tt">FILTER</span>
					<span   id="m_fI"><input id="m_ps" type="text" placeholder="Positive filter"/>
					<!--C--><input id="m_ng" type="text" placeholder="Negative filter" /></span>
					<button id="m_fB" type="submit">FILTER</button></span></div>

			</div>

		</div>
	</div></body></html>
