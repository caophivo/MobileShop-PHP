<?php
require_once '../../Libs/DataProvider.php';
	if(isset($_POST['submit'])){

	 	$maloai1 = $_POST['nbml'];
	 	if($maloai1=='Admin')
	 	{
	 		$maloai=0;
	 	}
	 	else
	 	{
	 		$maloai=1;
	 	}
	 	$taikhoan = $_POST['txtTaiKhoan'];
	 	$matkhau = md5($_POST['txtMatKhau']);
	 	$hoten = $_POST['txtHoTen'];
	 	$ns = $_POST['dateNS'];
	 	$diachi = $_POST['txtDiaChi'];
	 	$daxoa = 0;
		
//				tiến hành insert sản phẩm
		 		$sql = "INSERT INTO `taikhoan`(ID, MaLoai, TenTaiKhoan, MatKhau, HoTen, NgaySinh,DiaChi ,DaXoa) VALUES('', $maloai, '$taikhoan', '$matkhau', '$hoten', '$ns', '$diachi', $daxoa)";
				$result = DataProvider::ExecuteQuery($sql);
				if($result){
					$msg = 'Inserted!';
					echo "<script type='text/javascript'>alert('$msg');</script>";
					DataProvider::ChangeURL("../Modules/Insert/tai-khoan.php?insert-sp");
				}else{
					echo "Error";
				}
		}
	
?>