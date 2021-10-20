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
<script type="text/javascript"></script> </head>

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
				<textarea id="rslt" placeholder="RESULT WILL BE DISPLAYED HERE"></textarea>
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
				<textarea id="m_rs" placeholder="RESULT WILL BE DISPLAYED HERE"></textarea>
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
