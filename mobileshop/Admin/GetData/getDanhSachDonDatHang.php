<?php
require_once '../Libs/DataProvider.php';
		$sql = "SELECT dh.ID, dh.MaDonDatHang, dh.NgayLap, dh.TongThanhTien, dh.TinhTrang, dh.DaXoa, tk.HoTen, tk.NgaySinh, tk.DiaChi FROM `dathang` dh, `taikhoan` tk WHERE dh.MaTaiKhoan=tk.ID";
		$result = DataProvider::ExecuteQuery($sql);
		$i = 1;
		echo '
		<table cellpadding="2" cellspacing="2" border="1">
			<tr>
				<th>Họ tên khách</th>
				<th>Ngày sinh</th>
				<th>Địa chỉ</th>
				<th>Mã đơn hàng</th>
				<th>Ngày lập</th>
				<th>Tổng thành tiền</th>
				<th>Tình trạng</th>
				<th>Cập nhật</th>
				<th>Xóa</th>
			</tr>';
    	while($row = mysqli_fetch_array($result)){
    		$id = $row['ID'];
    		$hoten = $row['HoTen'];
    		$ngaysinh = $row['NgaySinh'];
    		$diachi = $row['DiaChi'];
    		$madh = $row['MaDonDatHang'];
    		$ngayLap = $row['NgayLap'];
    		$tongTien = $row['TongThanhTien'];
    		$tinhtrang = $row['TinhTrang'];
    		$daxoa = $row['DaXoa'];

	        $delete_restore = 'Delete';
	        if($daxoa == 1){
	        	$delete_restore = 'Restore';
	        }

	        $temp = '<td><a href="#" class="abtnDeleDonHang" name="'.$id.'">'.$delete_restore.'</a></td>';

    		$tinhTrangDonHang = "Chưa thanh toán";
    		if($tinhtrang == 1){
    			$tinhTrangDonHang = "Đã thanh toán";
    		}

			echo '<tr>
				<td>'.$hoten.'</td>
				<td>'.$ngaysinh.'</td>
				<td>'.$diachi.'</td>
				<td>'.$madh.'</td>
				<td>'.$ngayLap.'</td>
				<td>'.$tongTien.'</td>
				<td>'.$tinhTrangDonHang.'</td>
				<td><a href="pCart01.php?delete=<?php echo $index; ?>">Edit</a></td>
				'.$temp.'
			</tr>';
			
 			$i++;
    	}
    	echo '</table>';
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.abtnDeleDonHang').click(function(event) {
			var id = $(this).attr('name');
			var ht = $(this).html();
			if(ht == 'Delete'){
				$.get('Handling/Admin_XuLyXoaDonHang.php', {'idDelete':id}, function(data) {
					alert(data);
				});
				$(this).html('Restore');
			}else{
				$.get('Handling/Admin_XuLyXoaDonHang.php', {'idRestore':id}, function(data) {
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