<?php 
//include_once $_SERVER['DOCUMENT_ROOT'] . 'securimage/securimage.php';
require_once '../securimage/securimage.php';
require_once '../Libs/DataProvider.php';
	$securimage = new Securimage();
	if ($securimage->check($_POST['txtMaKiemTra']) == false) {
	  	echo 0;
	  	exit;
	} else{
		$maloai = 1;
		$username = $_POST['txtTenDangNhap'];
		$password = md5($_POST['txtMatKhau']);
		$name = $_POST['txtHoTen'];
		$birtday = $_POST['txtNgaySinh'];
		$address = $_POST['txtDiaChi'];

		$sql = "INSERT INTO `taikhoan`(ID, MaLoai, TenTaiKhoan, MatKhau, HoTen, NgaySinh, DiaChi) VALUES('',$maloai, '$username', '$password', '$name', '$birtday', '$address')";
		$result = DataProvider::ExecuteQuery($sql);
		if($result){
			echo 1;
		} else{
			echo 0;
		}
	}

 ?>