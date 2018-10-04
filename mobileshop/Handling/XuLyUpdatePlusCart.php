<?php
session_start();
require_once('../Libs/Item.php');
require_once('../Libs/DataProvider.php');

if(isset($_GET['idsp'])){
	$id = $_GET['idsp'];

	//TH1: chưa có sản phẩm trong giỏ hàng
	if(isset($_SESSION["maSP"]) == false || count($_SESSION["maSP"]) == 0){
		$_SESSION["maSP"][] = $id;
		$_SESSION["soLuongSP"][] = 1;
	}else{
		//TH2: đã có giỏ hàng
		//kiểm tra giỏ hàng có tồn tại sản phẩm có mã là $id chưa?
		for ($i=0; $i < count($_SESSION["maSP"]); $i++) { 
			if($_SESSION["maSP"][$i] == $id){
				break;
			}
		}
		//TH2.1: trong giỏ hàng đã có sản phẩm có mã là $id => tăng số lượng lên
		if($i < count($_SESSION["maSP"])){
			$_SESSION["soLuongSP"][$i] += 1;
		}else{
			//TH2.2: trong giỏ hàng chưa có sản phẩm có mã là $id
			$_SESSION["maSP"][] = $id;
			$_SESSION["soLuongSP"][] = 1;
		}
	}

	//đếm số lượng sản phẩm cho giỏ hàng
	if(isset($_SESSION["maSP"])){
		$dem = 0;
		for($i = 0; $i < count($_SESSION["maSP"]); $i++) {
			$dem += $_SESSION["soLuongSP"][$i];
		}
		$_SESSION['demSoLuongSP'] = $dem;
		echo $dem;
	}
	DataProvider::ChangeURL("../index.php?a=3");

}
?>