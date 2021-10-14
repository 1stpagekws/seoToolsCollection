<?php
set_include_path (get_include_path () . PATH_SEPARATOR . "./aaLbrr");
include_once "lbrr.php";

determineDiplaySizeToUse (); ?>

<!DOCTYPE html>
<head>
<title><?php echo fetchPrductName (); ?> || SEO Tools Collection</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprStylngCode (); ?>" />
<link rel="stylesheet" href="<?php echo prvideIdOfTheApprprPrsnalStylngCode (); ?>" /> </head>

<body><div id="body">
	<?php echo gnrateHeader (fetchPrductId (), "Seo Tools Collection"); ?>

	<div id="cntn">
		<span id="bnd1">
		<!--C-->
			<span
				id="pck0">
			<a id="itm1" class="grp1" href="anchor-text-generator">
				<img src="xwBck1.png" />
				<span>Anchor Text Generator</span> </a>
			<a id="itm2" class="grp2" href="keyword-density-checker">Keyword Density Checker</a>
					</span>

		<!--C-->
			<span
			   id="pck1">
			<a id="itm3" class="grp2" href="">Keyword Research</a>
			<a id="itm4" class="grp1" href="">
				<img src="xwBck2.png" />
				<span>Penalty Check</span> </a> </span> </span>

		<span id="bnd2">
		<!--C-->
			<span
			   id="pck2">
			<a id="itm5" class="grp1" href="">
				<img src="xwBck3.png" />
				<span>Rank Tracker</span> </a>
			<a id="itm6" class="grp1" href="">
				<img src="xwBck4.png" />
				<span>Site Grader</span> </a> </span>

		<!--C-->
			<span
			   id="pck3">
			<a id="itm7" class="grp2" href="">Spinax Tool</a>
			<a id="itm8" class="grp2" href="">Suggest Scraper</a> </span> </span> </div>

</div> </body> </html>
