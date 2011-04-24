<?php
echo "<head>\n";
    echo ' <link rel="stylesheet" href="css/style.css" type="text/css">'."\n";
	echo ' <link rel="stylesheet" href="css/web20.css" type="text/css">'."\n";
	echo ' <script type="text/javascript" src="js/tablesort.js"></script>'."\n";
	echo ' <script type="text/javascript" src="js/paginate.js"></script>'."\n";
	echo ' <script type="text/javascript" src="js/dragtable.js"></script>'."\n";
echo "</head>\n";

$jsonurl = "http://apps.pionline.com/RCTest/dj.asp";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);
$fields = array("2660_1", "31967_1", "31971_1", "31975_1");

//print_r($json_output);
//echo '<table align="center">\n';
//echo '<table align="center" class="sortable-onload-3 no-arrow rowstyle-alt colstyle-alt paginate-50 max-pages-7 draggable">'."\n";
/*echo "<th>Company Name</th>\n";
echo "<th>Worldwide Assets Under Management (AUM)</th>\n";
echo "<th>Total Equity Assets</th>\n";
echo "<th>Total Fixed Income Assets</th>\n";
echo "<th>Total Alternative Assets</th>\n";
*/
?>
<caption>(Click and drag on column titles to reorder)</caption>
<table align="center" class="sortable-onload-3 no-arrow rowstyle-alt colstyle-alt paginate-50 max-pages-7 draggable">

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
    //echo "$body->NAME<br>";

	echo "<tr>\n";
	echo "<td>" . $body->NAME . "</td>\n";
	foreach ($fields as $field) {
		echo "<td>" . $body->DATA->$field . "</td>\n";
	}
	echo "</tr>\n";
}
echo "</table>\n";
?>