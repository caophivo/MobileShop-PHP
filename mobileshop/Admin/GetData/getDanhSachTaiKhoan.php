<?php
require_once '../Libs/DataProvider.php';
		$sql = "SELECT * FROM `taikhoan` WHERE 1";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		echo '
		<table cellpadding="2" cellspacing="2" border="1">
			<tr>
				<th>Id</th>
				<th>Mã loại</th>
				<th>Tên tài khoản</th>
				<th>Mật khẩu</th>
				<th>Họ tên</th>
				<th>Ngày sinh</th>
				<th>Địa chỉ</th>
				<th>Cập nhật</th>
				<th>Xóa</th>
			</tr>';
    	while($row = mysqli_fetch_array($result)){
    		$id = $row['ID'];
    		$maloai = $row['MaLoai'];
    		$taikhoan = $row['TenTaiKhoan'];
    		$matkhau = $row['MatKhau'];
    		$hoten = $row['HoTen'];
    		$ngaysinh = $row['NgaySinh'];
    		$diachi = $row['DiaChi'];
    		$daxoa = $row['DaXoa'];

	        $delete_restore = 'Delete';
	        if($daxoa == 1){
	        	$delete_restore = 'Restore';
	        }

	        $temp = '<td><a href="#" class="abtnDeleAccount" name="'.$id.'">'.$delete_restore.'</a></td>';

			echo '<tr>
				<td>'.$id.'</td>
				<td>'.$maloai.'</td>
				<td>'.$taikhoan.'</td>
				<td>'.$matkhau.'</td>
				<td>'.$hoten.'</td>
				<td>'.$ngaysinh.'</td>
				<td>'.$diachi.'</td>
				<td><a href="pCart01.php?delete=<?php echo $index; ?>">Edit</a></td>
				'.$temp.'
			</tr>';
			
 			$i++;
    	}
    	echo '</table>';
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.abtnDeleAccount').click(function(event) {
			var id = $(this).attr('name');
			var ht = $(this).html();
			if(ht == 'Delete'){
				$.get('Handling/Admin_XuLyXoaTaiKhoan.php', {'idDelete':id}, function(data) {
					alert(data);
				});
				$(this).html('Restore');
			}else{
				$.get('Handling/Admin_XuLyXoaTaiKhoan.php', {'idRestore':id}, function(data) {
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