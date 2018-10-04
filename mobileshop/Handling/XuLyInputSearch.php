<?php
require_once '../Libs/DataProvider.php';
	if(isset($_GET['key'])){
		$key = $_GET['key'];
		DataProvider::ChangeURL("../index.php?a=6&key=$key");
	}
?>