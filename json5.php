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

<body>
<div id="container">
<div id="title">
<a href="json5.php"><img src="img/pilogo.png" width="379" height="69"></a>
<p class="subtitle">Tabular Reference Area</p>
</div>
<div id="copy">
<p class="copy">This section of the site hosts an interactive chart of financial stats gathered from our 100 most popular financial companies.</p>
<p class="instructions">CLICK on a column heading to sort.  Or DRAG to rearrange the columns.</p>
</div>

<form name="select_paginate" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<select name="paginate" onchange="this.form.submit()">
<option value="10">10</option>
<option value="25">25</option>
<option value="50" selected="selected">50</option>
<option value="100">100</option>
</select>
</form>

<?php
if (isset($_GET['paginate'])) {
	$items_per_page = $_GET['paginate'];
} else {
	$items_per_page = 50;
}
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
echo "</table>\n";

?>
</div>
</body>