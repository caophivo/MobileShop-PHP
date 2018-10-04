<?php
require_once '../../Libs/DataProvider.php';
	if(isset($_POST['submit'])){
		$name = $_FILES["imgProduct"]["name"];
		$type = $_FILES["imgProduct"]["type"];
		$size = $_FILES["imgProduct"]["size"];

		$id = $_POST['txtIDLoai'];
	 	$ten = $_POST['txtTenLoai'];
	 	$icon = $_POST['txtIcon'];
	 	$idName = $_POST['txtIDName'];
	 	
		if($size == null){
			//tiến hành update sản phẩm
	 		$sql = "UPDATE `loai` SET ID=$id, TenLoai='$ten', Icon='$icon', IDName='$idName' WHERE ID=$id";
			$result = DataProvider::ExecuteQuery($sql);
			if($result){
				$msg = 'Updated!';
				echo "<script type='text/javascript'>alert('$msg');</script>";
				DataProvider::ChangeURL("../Modules/mAdmin_UpdateLoaiSanPham.php?update-loai-sp=$id");
			}else{
				echo "Error";
			}
		}else{ //size khac null
			if( $size <= 5*1024*1024 ) {
				move_uploaded_file(
					$_FILES["imgProduct"]["tmp_name"], 
					"../../Images/Icons/$name"
				);
				//tiến hành update sản phẩm
		 		$sql = "UPDATE `loai` SET ID=$id, TenLoai='$ten', Icon='$icon', IDName='.$idName.' WHERE ID=$id";
				$result = DataProvider::ExecuteQuery($sql);
				if($result){
					$msg = 'Updated new image product!';
					echo "<script type='text/javascript'>alert('$msg');</script>";
					DataProvider::ChangeURL("../Modules/mAdmin_UpdateSanPham.php?update-loai-sp=$id");
				}else{
					echo "Error";
				}
			}else{
				echo "FIle cua ban phai nho hon 5M";	
			}
		}
	}
?>