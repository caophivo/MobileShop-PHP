<?php 
session_start();
	if(isset($_SESSION['nguoiDung']) == false){
		header('location: ../index.php');
	}
	include_once('../Modules/mAdmin.php');
 ?>