<?php
echo "<head>\n";
	echo ' <script type="text/javascript" src="js/tablesort.js"></script>'."\n";
	echo ' <script type="text/javascript" src="js/paginate.js"></script>'."\n";
	echo ' <script type="text/javascript" src="js/dragtable.js"></script>'."\n";
	    echo ' <link rel="stylesheet" href="css/style.css" type="text/css">'."\n";
	echo ' <link rel="stylesheet" href="css/web20.css" type="text/css">'."\n";
echo "</head>\n";

$jsonurl = "http://apps.pionline.com/RCTest/dj.asp";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);
$fields = array("2660_1", "31967_1", "31971_1", "31975_1");
$num_paginate = 50;
?>

<!--[if IE]>
<style type="text/css">
ul.fdtablePaginater {display:inline-block;}
ul.fdtablePaginater {display:inline;}
ul.fdtablePaginater li {float:left;}
ul.fdtablePaginater {text-align:center;}
table { border-bottom:1px solid #C1DAD7; }
</style>
<![endif]-->

<body>
<div id="container">
<div id="top_frame">
<div id="title">
	<a href="tabular_reference.php"><img src="img/pilogo.png" width="379" height="69" border="0"></a>
	<p class="subtitle">Tabular Reference Area</p>
</div>
<div id="copy">
	<p class="copy">This section of the site hosts an interactive chart of financial stats gathered from our 100 most popular financial companies.</p>
	<p class="instructions">CLICK on a column heading to sort.  Or DRAG to rearrange the columns.</p>
</div>

<?php

//BEGIN CUSTOM PAGINATION

//Default to 50 items per page
if (isset($_GET['paginate'])) {
	$items_per_page = $_GET['paginate'];
} else {
	$items_per_page = 50;
}

$paginate_options = array(10,25,50,100);

echo '<div id="paginate_select">' . "\n";

echo '<p class="paginate_select">Number of items per page:' . "\n";

echo '<form name="select_paginate" action="' . $_SERVER['PHP_SELF'] . '" method="GET">' . "\n";
echo '<select name="paginate" onchange="this.form.submit()">' . "\n";

if (isset($_GET['paginate'])) {
	foreach ($paginate_options as $currOption) {
		if ($_GET['paginate'] == $currOption) {
			echo '<option value="' . $currOption . '" selected="selected">' . $currOption . '</option>' . "\n";
		} else {
			echo '<option value="' . $currOption . '">' . $currOption . '</option>' . "\n";
		}
	}
} else {
?>
<option value="10">10</option>
<option value="25">25</option>
<option value="50" selected="selected">50</option>
<option value="100">100</option>
<?php
}
?>
</select>
</form>
</p>
</div> <!-- close paginate_select -->
</div> <!-- close top_frame -->

<?php 
//END CUSTOM PAGINATION 
?>


<table class="sortable-onload-0 no-arrow rowstyle-alt colstyle-alt paginate-<?php echo $items_per_page ?> max-pages-7 draggable">
<thead>
<tr>
	<th class="sortable-text">Company Name</th>
	<th class="sortable-currency">Worldwide Assets Under Management (AUM)</th>
	<th class="sortable-currency">Total Equity Assets</th>
	<th class="sortable-currency">Total Fixed Income Assets</th>
	<th class="sortable-currency">Total Alternative Assets</th>
</tr>
</thead>

<?php
foreach ( $json_output->BODY as $body )
{
	echo "<tr>\n";
	echo '<td class="name">' . $body->NAME . '</td>' . "\n";
	foreach ($fields as $field) {
		echo '<td class="data">' . number_format($body->DATA->$field, 2) . '</td>' . "\n";
	}
	echo "</tr>\n";
}
?>

</table>
</div> <!-- close container -->
</body>

<!-- Were this a real application, the below would be in a separate "include" file -->
<foot>
<br><br>
<a href="attribution.php">Attribution and Acknowledgement</a>
</foot>