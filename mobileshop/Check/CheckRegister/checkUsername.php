<?php 
require_once('../../Libs/DataProvider.php');
	$us = $_GET['us'];

	if(strpos($us, ' ') || $us == ''){
		echo 1;
		exit;
	}

	$sql = "SELECT ID FROM `taikhoan` WHERE TenTaiKhoan='$us' ";

	$result = DataProvider::ExecuteQuery($sql);

	$dong = mysqli_num_rows($result);

	echo $dong;

 ?>