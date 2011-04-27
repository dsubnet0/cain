<?php
echo "<head>";
    echo " <link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">";
	echo ' <script type="text/javascript" src="js/tablesort.js"></script>';
	echo ' <script type="text/javascript" src="js/paginate.js"></script>';
echo "</head>";

$jsonurl = "http://apps.pionline.com/RCTest/dj.asp";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);
$fields = array("2660_1", "31967_1", "31971_1", "31975_1");

//print_r($json_output);
//echo '<table align="center">\n';
echo '<table align="center" class="sortable-onload-3 no-arrow rowstyle-alt colstyle-alt paginate-10 max-pages-7 paginationcallback-callbackTest-calculateTotalRating paginationcallback-callbackTest-displayTextInfo sortcompletecallback-callbackTest-calculateTotalRating">'."\n";
echo "<th>Company Name</th>\n";
echo "<th>Worldwide Assets Under Management (AUM)</th>\n";
echo "<th>Total Equity Assets</th>\n";
echo "<th>Total Fixed Income Assets</th>\n";
echo "<th>Total Alternative Assets</th>\n";
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