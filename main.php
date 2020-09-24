<!DOCTYPE html>
<style>
	<?php require 'css/index.css'; ?>
</style>
<html>
<head>
	<title>Phòng đào tạo</title>
	<button class="button" style="float: left; position: relative; top: 23px; left: 5px;" onclick="window.open('up_task.php', '_self')">Đăng bài</button>
	<button class="button" style="float: left; position: relative; top: 23px; left: 10px;" onclick="window.open('show_task.php', '_self')">Xem bài tập</button>
	<div>	
		<h2 style="float: left;">Danh sách sinh viên</h2>
		<button class="button" style="float: right; position: relative; top: 23px; right: 15px;" onclick="window.open('input.php', '_self')">Thêm sinh viên</button>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
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

<?php
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
			<td><button class="button button3" onclick="xoa_sv('.$sv['id'].')">Xóa</button></td>
		</tr>';
}
?>
		</tbody>
	</table>
<?php
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql = 'select * from teacher where id = '.$id;
	$conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');
	$query = mysqli_query($conn, $sql);
	$list_teacher = [];
	while ($row = mysqli_fetch_array($query, 1)) {
		$list_teacher[] = $row;
	}
	if ($list_teacher!= null && count($list_teacher) > 0) {
		$gv = $list_teacher[0];
	}
}
echo '<button class="button button1" onclick=\'window.open("message_box.php?username='.$gv['username'].'","_self")\'>Xem hộp thư</button>';
echo '<button style="float: right; position: relative; top: 23px; right: 15px;" class="button button2" 
onclick=\'window.open("challenge.php","_self")\'>Challenge</button>';
?>

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
