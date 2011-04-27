<?php
$jsonurl = "http://apps.pionline.com/RCTest/dj.asp";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);
$fields = array("2660_1", "31967_1", "31971_1", "31975_1");

//MAIN
//print_r($json_output);
foreach ( $json_output->BODY as $row ) {
	//echo "$row->NAME<br>\n";
	$HASH[$row->NAME] = $row;
}
ksort($HASH);
foreach ( $HASH as $key => $value) {
	//print_r($value);
	echo "$value->NAME\n";
	echo "<br>";
}

//print_r($HASH);

function my_sort($a, $b) {
	if ($a->NAME < $b->NAME) {
		return -1;
	} else {
		return 0;
	}
}
?>