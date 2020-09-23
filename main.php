<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Phòng đào tạo</title>
	<button class="button" onclick="window.open('up_task.php', '_self')">Đăng bài</button>
	<button class="button" onclick="window.open('show_task.php', '_self')">Xem bài tập</button>
	<button class="button" onclick="window.open('input.php', '_self')">Thêm sinh viên</button>	
	<!-- jQuery library -->
	<script src="lib/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="lib/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="styled-table">
		<thead>
			<tr>
				<th>Tên đăng nhập</th>
				<th></th>
				<th>Họ tên</th>
				<th></th>
				<th></th>
				<th width="50"></th>
				<th width="50"></th>
				<th width="50"></th>
			</tr>
		</thead>
		<tbody>

<?php require_once 'db_helper.php';

$conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');
$sql = 'select * from student';
$list_student = execute_result($sql);

foreach ($list_student as $sv) {
	echo '<tr>
			<td>'.$sv['username'].'</td>
			<td></td>
			<td>'.$sv['fullname'].'</td>
			<td></td>
			<td></td>
			<td><button class="button button5" onclick=\'window.open("details_main.php?id='.$sv['id'].'","_self")\'>Chi tiết</button></td>
			<td><button class="button button2" onclick=\'window.open("input.php?id='.$sv['id'].'","_self")\'>Sửa</button></td>
			<td><button class="button button3" onclick="DeleteUser('.$sv['id'].')">Xóa</button></td>
		</tr>';
}
?>
		</tbody>
	</table>
<?php
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql = 'select * from teacher where id = '.$id;
	$list_teacher = execute_result($sql);
	if ($list_teacher!= null && count($list_teacher) > 0) {
		$gv = $list_teacher[0];
	}
}
echo '<button class="button button1" onclick=\'window.open("message_box.php?username='.$gv['username'].'","_self")\'>Xem hộp thư</button>';
?>

</body>
</html>

<!-- ham xoa sinh vien -->
<script type="text/javascript">
		function DeleteUser(id) {
			if(confirm('Xác nhận xóa?')) {
				$.post('delete_user.php', {'id': id},
				function(data) {location.reload()})
			}	
		}
</script>
