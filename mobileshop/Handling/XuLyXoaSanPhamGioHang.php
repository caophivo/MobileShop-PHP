<?php 
session_start();
require_once('../Libs/DataProvider.php');
	if(isset($_GET['delete'])){
		$vitri = $_GET['delete'];
		array_splice($_SESSION["maSP"], $vitri, 1);
		array_splice($_SESSION["soLuongSP"], $vitri, 1);

		//đếm số lượng sản phẩm cho giỏ hàng
		if(isset($_SESSION["maSP"])){
			$dem = 0;
			for($i = 0; $i < count($_SESSION["maSP"]); $i++) {
				$dem += $_SESSION["soLuongSP"][$i];
			}
			$_SESSION['demSoLuongSP'] = $dem;
		}
	}
	DataProvider::ChangeURL("../index.php?a=3")
 ?>
