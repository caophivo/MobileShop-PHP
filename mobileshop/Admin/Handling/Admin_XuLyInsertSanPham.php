<?php
require_once '../../Libs/DataProvider.php';
	if(isset($_POST['submit'])){
		$name = $_FILES["imgProduct"]["name"];
		$type = $_FILES["imgProduct"]["type"];
		$size = $_FILES["imgProduct"]["size"];

	 	$ten = $_POST['txtTenSanPham'];
	 	$chitiet = $_POST['txtChiTiet'];
	 	$hang = $_POST['txtHangSanXuat'];
	 	$loai = $_POST['txtLoai'];
	 	$soluong = $_POST['txtSoLuong'];
	 	$gia = str_replace(".","",$_POST['txtGia']);//xóa dấu chấm
	 	$hinh = $name;
	 	$trangthai = 0;

	 	//get mã loại với tên loại
		$sql1 = "SELECT ID FROM `loai` WHERE TenLoai='$loai'";
		$result1 = DataProvider::ExecuteQuery($sql1);
		$maloai = mysqli_fetch_array($result1)['ID'];
		//get mã nhà sản xuất với tên nhà sản xuất
		$sql2 = "SELECT ID FROM `nhasanxuat` WHERE NhaSanXuat='$hang'";
		$result2 = DataProvider::ExecuteQuery($sql2);
		$mansx = mysqli_fetch_array($result2)['ID'];
		
		if( $size <= 5*1024*1024 ) {
				//upload hình ảnh
				move_uploaded_file(
					$_FILES["imgProduct"]["tmp_name"], 
					"../../Images/$name"
				);
				//tiến hành insert sản phẩm
		 		$sql = "INSERT INTO `sanpham`(ID, MaLoai, TenSanPham, MaNhaSanXuat, SoLuong, Gia, ChiTiet, Img, DaXoa) VALUES('', $maloai, '$ten', $mansx, $soluong, $gia, '$chitiet', '$hinh', $trangthai)";
				$result = DataProvider::ExecuteQuery($sql);
				if($result){
					$msg = 'Inserted!';
					echo "<script type='text/javascript'>alert('$msg');</script>";
					DataProvider::ChangeURL("../Modules/Insert/san-pham.php?insert-sp");
				}else{
					echo "Error";
				}
		}else{
			echo "FIle cua ban phai nho hon 5M";	
		}
	}
?>