<?php 
session_start();
require_once('../Libs/DataProvider.php');
	
	$maTaiKhoan = $_SESSION["maTaiKhoan"];
	$tongTien = $_GET["tong"];
	$ngayLap = date("Y-m-d");
	
	$sql = "SELECT COUNT(*) FROM `dathang` WHERE NgayLap=$ngayLap";
	$result = DataProvider::ExecuteQuery($sql);
   	$row = mysqli_fetch_array($result);

	//phát sinh mã đơn hàng
   	if($row == null){
   		$sodonhang = 0;
   	}else{
   		$sodonhang = $row[0] + 1;
   	}
   	$ngay = date("d");
   	$thang = date("m");
   	$nam = substr(date("Y"), 2, 2);
   	$gio = time();

   	$maDonDatHang = $ngay.$thang.$nam.$gio.sprintf("%1$03d", $sodonhang);

   	$sql = "INSERT INTO `dathang`(ID, MaDonDatHang, MaTaiKhoan, NgayLap, TongThanhTien, TinhTrang) VALUES('', '$maDonDatHang', $maTaiKhoan, '$ngayLap', $tongTien, 0)";   	
   	DataProvider::ExecuteQuery($sql);

   	for ($i=0; $i < count($_SESSION["maSP"]); $i++) {
   		//Thêm chi tiết đơn đặt hàng
   		$maChiTiet = $maDonDatHang.sprintf("%1$03d", $i);
   		$maSP = $_SESSION["maSP"][$i];
   		$soLuong = $_SESSION["soLuongSP"][$i];

   		$sql = "SELECT Gia, SoLuong FROM `sanpham` WHERE ID=$maSP";
   		$result = DataProvider::ExecuteQuery($sql);
   		$row = mysqli_fetch_array($result);
   		$giaTemp = number_format($row["Gia"], 0, '.', '.');
   		$gia = str_replace(".","",$giaTemp);
   		$soLuongConLai = $row["SoLuong"] - $soLuong;

   		$sql = "INSERT INTO `chitietdathang`(MaChiTietDonDatHang, SoLuong, Gia, MaDonDatHang, MaSanPham) VALUES('$maChiTiet', $soLuong, $gia, '$maDonDatHang', $maSP)";
   		DataProvider::ExecuteQuery($sql);

		//cập nhật số lượng còn lại
		$sql = "UPDATE `sanpham` SET SoLuong=$soLuongConLai WHERE ID=$maSP";
		DataProvider::ExecuteQuery($sql);

   	}
   	unset($_SESSION["maSP"]);
   	unset($_SESSION["soLuongSP"]);
   	unset($_SESSION['demSoLuongSP']);
   	DataProvider::ChangeURL("../index.php?a=5");

?>