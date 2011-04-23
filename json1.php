<?php
	class JSON_interact {
		private $jsonurl = "http://apps.pionline.com/RCTest/dj.asp";
		public $json, $json_output;
		
		function __construct() {
			$this->json = file_get_contents($jsonurl,0,null,null);
			$this->json_output = json_decode($json);
		}
		
	}

//MAIN

$my_json = new JSON_interact();

print_r($my_json->json_output);	
	
?>