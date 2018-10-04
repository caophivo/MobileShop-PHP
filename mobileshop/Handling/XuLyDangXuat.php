<?php 
	session_start();
	unset($_SESSION['nguoiDung']);
	unset($_SESSION['demSLSP']);
	unset($_SESSION['cart']);
	unset($_SESSION['maSP']);
	unset($_SESSION['soLuongSP']);
	unset($_SESSION['demSoLuongSP']);
	header('location: ../');
 ?>