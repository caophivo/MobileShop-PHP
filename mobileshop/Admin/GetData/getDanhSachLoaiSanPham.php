<?php
require_once '../Libs/DataProvider.php';
		$sql = "SELECT * FROM `loai` WHERE 1";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		echo '
		<table cellpadding="2" cellspacing="2" border="1">
			<tr>
				<th>Id</th>
				<th>Ten</th>
				<th>icon</th>
				<th>idname</th>
				<th>Cập nhật</th>
				<th>Xóa</th>
			</tr>';
    	while($row = mysqli_fetch_array($result)){
    		$id = $row['ID'];
    		$ten = $row['TenLoai'];
    		$icon = $row['Icon'];
	        $idname = $row['IDName'];
	        $daxoa = $row['DaXoa'];

	        $delete_restore = 'Delete';
	        if($daxoa == 1){
	        	$delete_restore = 'Restore';
	        }

	        $temp = '<td><a href="#" class="abtnDeleteLoaiSP" name="'.$id.'">'.$delete_restore.'</a></td>';
			echo '<tr>
				<td>'.$id.'</td>
				<td>'.$ten.'</td>
				<td>'.$icon.'</td>
				<td>'.$idname.'</td>
				<td><a href="Modules/mAdmin_UpdateLoaiSanPham.php?update-loai-sp='.$id.'" onclick="return confirm("Are you sure?")">Edit</a></td>
				'.$temp.'
			</tr>';
			
 			$i++;
    	}
    	echo '</table>';
?>


<script type="text/javascript">
	$(document).ready(function() {
		$('.abtnDeleteLoaiSP').click(function(event) {
			var id = $(this).attr('name');
			var ht = $(this).html();
			if(ht == 'Delete'){
				$.get('Handling/Admin_XuLyXoaLoaiSanPham.php', {'idDelete':id}, function(data) {
					alert(data);
				});
				$(this).html('Restore');
			}else{
				$.get('Handling/Admin_XuLyXoaLoaiSanPham.php', {'idRestore':id}, function(data) {
					alert(data);
				});
				$(this).html('Delete');
			}
		});
	});
</script>

<style type="text/css">
table{
	width: 100%;
	height: 100%;
}
</style>