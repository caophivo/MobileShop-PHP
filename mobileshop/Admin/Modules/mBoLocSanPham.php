<div id="boloc">
	<select name="" id="boLocNSX">
		<?php
		require_once '../Libs/DataProvider.php';
			$sql = "SELECT NhaSanXuat FROM `nhasanxuat`";
			$result = DataProvider::ExecuteQuery($sql);
			$i = 1;
			while($row = mysqli_fetch_array($result)){
				$hang = $row['NhaSanXuat'];
				echo "<option>$hang</option>";
				$i++;
			}
		?>
	</select>
</div>
<div id="boloc02">
	<select name="" id="boLocLoai">
		<?php
		require_once '../Libs/DataProvider.php';
			$sql = "SELECT TenLoai FROM `loai`";
			$result = DataProvider::ExecuteQuery($sql);
			$i = 1;
			while($row = mysqli_fetch_array($result)){
				$tenloai = $row['TenLoai'];
				echo "<option>$tenloai</option>";
				$i++;
			}
		?>
	</select>
</div>