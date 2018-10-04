<?php 
require_once '../../Libs/DataProvider.php';

	if(isset($_GET['idDelete'])){
		$idDelete = $_GET['idDelete'];
		
		$sql = "UPDATE `dathang` SET DaXoa=1 WHERE ID=$idDelete";
		$result = DataProvider::ExecuteQuery($sql);
		if($result){
			echo "Deleted";
		}
	}
	if(isset($_GET['idRestore'])){
		$idRestore = $_GET['idRestore'];

		$sql = "UPDATE `dathang` SET DaXoa=0 WHERE ID=$idRestore";
		$result = DataProvider::ExecuteQuery($sql);
		if($result){
			echo "Restored";
		}
	}
 ?>