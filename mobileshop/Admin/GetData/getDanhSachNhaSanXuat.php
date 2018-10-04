<?php
require_once '../Libs/DataProvider.php';
		$sql = "SELECT * FROM `nhasanxuat` WHERE 1";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		echo '
		<table cellpadding="2" cellspacing="2" border="1">
			<tr>
				<th>Id</th>
				<th>Tên</th>
				<th>Cập nhật</th>
				<th>Xóa</th>
			</tr>';
    	while($row = mysqli_fetch_array($result)){
    		$id = $row['ID'];
    		$ten = $row['NhaSanXuat'];
			$daxoa = $row['DaXoa'];

	        $delete_restore = 'Delete';
	        if($daxoa == 1){
	        	$delete_restore = 'Restore';
	        }

	        $temp = '<td><a href="#" class="abtnDeleteNSX" name="'.$id.'">'.$delete_restore.'</a></td>';

			echo '<tr>
				<td>'.$id.'</td>
				<td>'.$ten.'</td>
				<td><a href="pCart01.php?delete=<?php echo $index; ?>">Edit</a></td>
				'.$temp.'
			</tr>';
			
 			$i++;
    	}
    	echo '</table>';
?>


<script type="text/javascript">
	$(document).ready(function() {
		$('.abtnDeleteNSX').click(function(event) {
			var id = $(this).attr('name');
			var ht = $(this).html();
			if(ht == 'Delete'){
				$.get('Handling/Admin_XuLyXoaNSX.php', {'idDelete':id}, function(data) {
					alert(data);
				});
				$(this).html('Restore');
			}else{
				$.get('Handling/Admin_XuLyXoaNSX.php', {'idRestore':id}, function(data) {
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