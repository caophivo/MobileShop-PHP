<?php
require_once '../../Libs/DataProvider.php';
	if(isset($_POST['submit'])){
		$name = $_FILES["imgProduct"]["name"];
		$type = $_FILES["imgProduct"]["type"];
		$size = $_FILES["imgProduct"]["size"];

		$id = $_POST['txtIDSP'];
	 	$ten = $_POST['txtTenSanPham'];
	 	$chitiet = $_POST['txtChiTiet'];
	 	$hang = $_POST['txtHangSanXuat'];
	 	$loai = $_POST['txtLoai'];
	 	$soluong = $_POST['txtSoLuong'];
	 	$gia = str_replace(".","",$_POST['txtGia']);//xóa dấu chấm
	 	$hinh = $_POST['txtHinhAnh'];
	 	$trangthai = $_POST['txtTrangThai'];

	 	//get mã loại với tên loại
		$sql1 = "SELECT ID FROM `loai` WHERE TenLoai='$loai'";
		$result1 = DataProvider::ExecuteQuery($sql1);
		$maloai = mysqli_fetch_array($result1)['ID'];
		//get mã nhà sản xuất với tên nhà sản xuất
		$sql2 = "SELECT ID FROM `nhasanxuat` WHERE NhaSanXuat='$hang'";
		$result2 = DataProvider::ExecuteQuery($sql2);
		$mansx = mysqli_fetch_array($result2)['ID'];
		
		if($size == null){
			//tiến hành update sản phẩm
	 		$sql = "UPDATE `sanpham` SET ID=$id, MaLoai=$maloai, TenSanPham='$ten', MaNhaSanXuat=$mansx, SoLuong=$soluong, Gia=$gia, ChiTiet='$chitiet', Img='$hinh', DaXoa=$trangthai WHERE ID=$id";
			$result = DataProvider::ExecuteQuery($sql);
			if($result){
				$msg = 'Updated!';
				echo "<script type='text/javascript'>alert('$msg');</script>";
				DataProvider::ChangeURL("../Modules/mAdmin_UpdateSanPham.php?update-sp=$id");
			}else{
				echo "Error";
			}
		}else{ //size khac null
			if( $size <= 5*1024*1024 ) {
				move_uploaded_file(
					$_FILES["imgProduct"]["tmp_name"], 
					"../../Images/$name"
				);
				//tiến hành update sản phẩm
		 		$sql = "UPDATE `sanpham` SET ID=$id, MaLoai=$maloai, TenSanPham='$ten', MaNhaSanXuat=$mansx, SoLuong=$soluong, Gia=$gia, ChiTiet='$chitiet', Img='$name', DaXoa=$trangthai WHERE ID=$id";
				$result = DataProvider::ExecuteQuery($sql);
				if($result){
					$msg = 'Updated new image product!';
					echo "<script type='text/javascript'>alert('$msg');</script>";
					DataProvider::ChangeURL("../Modules/mAdmin_UpdateSanPham.php?update-sp=$id");
				}else{
					echo "Error";
				}
			}else{
				echo "FIle cua ban phai nho hon 5M";	
			}
		}
	}
?>