<?php 
	if(isset($_GET['id'])){
		$idLoaiSP = $_GET['id'];

		$sql = "SELECT TenLoai FROM `loai` WHERE ID=$idLoaiSP AND DaXoa=0";
		$result = DataProvider::ExecuteQuery($sql);
		$tensp = mysqli_fetch_array($result)['TenLoai'];
    	echo'<div class="divloadmore">
				<button id="loadmore">
					Xem thêm <font style="text-transform: lowercase;">'.$tensp.'</font>
				</button>
			</div>';
	}
 ?>

