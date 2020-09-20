<!DOCTYPE html>
<style>
	<?php require 'index.css'; ?>
</style>
<html>
<head>
	<title>Phòng đào tạo</title>
	<div>
		<h1 style="float: left;">Danh sách sinh viên</h1>
			<button class="button" style="float: right; position: relative; top: 23px; right: 15px;" onclick="window.open('input.php', '_self')">Thêm sinh viên</button>
	</div>
	<!-- js de viet ham script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="styled-table">
		<thead>
			<tr>
				<th>Tên đăng nhập</th>
				<th>Mật khẩu</th>
				<th>Họ tên</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th width="50"></th>
				<th width="50"></th>
			</tr>
		</thead>
		<tbody>

<?php

//lay thong tin tu db
$conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');
$sql = 'select * from student';
$query = mysqli_query($conn, $sql);
$list_student = [];
while ($row = mysqli_fetch_array($query, 1)) {
	$list_student[] = $row;
}

foreach ($list_student as $sv) {
	echo '<tr>
			<td>'.$sv['username'].'</td>
			<td>'.$sv['userpwd'].'</td>
			<td>'.$sv['fullname'].'</td>
			<td>'.$sv['email'].'</td>
			<td>'.$sv['phone'].'</td>
			<td><button class="button button2" onclick=\'window.open("input.php?id='.$sv['id'].'","_self")\'>Sửa</button></td>
			<td><button class="button button3" onclick="xoa_sv('.$sv['id'].')">Xóa</button></td>
		</tr>';
}
?>
		</tbody>
	</table>
</body>
</html>

<!-- ham xoa sinh vien -->
<script type="text/javascript">
		function xoa_sv(id) {
			if(confirm('Xác nhận xóa?')) {
				$.post('delete.php', {'id': id},
				function(data) {location.reload()})
			}	
		}
</script>

