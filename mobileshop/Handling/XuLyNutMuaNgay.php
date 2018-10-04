<?php 
	session_start();
	$idSP = $_GET['idsp'];
	if(isset($_SESSION['nguoiDung'])){
		$_SESSION['slCart'] = 1;
		$_SESSION['slCart']++;
		header('location: ../index.php?a=3&idsp='.$idSP.'');
	} else{
		header('location: ../index.php?a=2&idsp='.$idSP.'');
	}

 ?>

 