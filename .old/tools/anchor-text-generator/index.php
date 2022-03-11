<?php
set_include_path (get_include_path () . PATH_SEPARATOR . "../aaLbrr");
include_once "lbrr.php";

determineDiplaySizeToUse (); ?>

<!DOCTYPE html>
<head>
<title><?php echo fetchPrductName (); ?> || SEO Tools Collection || Anchor Text Generator
	</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprStylngCode (); ?>" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprPrsnalStylngCode (); ?>" />
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

<body><div id="body">
	<?php echo gnrateHeader (fetchPrductId () . "/tools", "Anchor Text Generator"); ?>

	<div id="cntn">
		<div id="note">Hey there! I am Chloe - I am your anchor text generator assistant. I
will help you navigate the hassle of generating the perfect anchor text for your project. Google
wants good SEO anchor codes. I can help you generate them, thereby helping to improve SEO
rankings on SERP.</div>

		<div id="tool">
		    <div id="cntn_sde1">
        		<textarea id="cntn_sde1_txt1" name="link" placeholder="You may enter multiple links: 1 link per line / 1,000 links max"></textarea> <br />

		        <textarea id="cntn_sde1_txt2" name="name" placeholder="Enter corresponding names: 1 per line / 1,000 names max"></textarea> <br />

			    <span id="cntn_sde1_itm3">
			    <!--C--><span id="tkn1">When clicked, should the link open in a new tab?
			        </span> <br />
        		<!--C-->NO:  <input id="opt1" type="radio" name="ntre" value="No" checked />
        		<!--C--><span id="tkn3"></span> 
        		<!--C-->YES: <input id="opt2" type="radio" name="ntre" value="Yes" />
       					</span> </div>

			<div id="cntn_sde2">
				<span id="cntn_sde2_itm0">RESULT</span>

				<textarea id="cntn_sde2_itm1" name="otpt"
						placeholder="I post my errors and results here. See the 'Generate' button below" disabled></textarea>
					<br />

			    <span id="cntn_sde2_itm2">
			    <!--C--><button id="btn1" type="button" onclick="clearF ()">CLEAR</button>
       			<!--C--><button id="btn2" type="button" onclick="prcess ()">
       				GENERATE</button> </span> </div> </div> </div> </div> </body> </html>
