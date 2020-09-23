<!DOCTYPE html>
<style>
	<?php require 'index.css'; ?>
</style>
<html>
<head>
	<title>Phòng đào tạo</title>
	<div>
		<h1 style="float: left;">Danh sách sinh viên</h1>
		<button class="button" style="float: right; position: relative; top: 23px; right: 15px;" onclick="window.open('validate.php', '_self')">Sửa thông tin</button>
	</div>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="lib/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="lib/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="lib/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="lib/bootstrap.min.js"></script>
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
mysqli_close($conn);

$sql = 'select * from student';

foreach ($list_student as $sv) {
	echo '<tr>
			<td>'.$sv['username'].'</td>
			<td></td>
			<td>'.$sv['fullname'].'</td>
			<td></td>
			<td></td>		
			<td><button class="button button5" onclick=\'window.open("details_sub.php?id='.$sv['id'].'","_self")\'>Chi tiết</button></td>
			</tr>';
}
?>
		</tbody>
	</table>
<?php
if (isset($_GET['id'])) {
	$id          = $_GET['id'];

	$sql = 'select * from student where id = '.$id;
	$conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');
	$query = mysqli_query($conn, $sql);
	$list_student = [];
	while ($row = mysqli_fetch_array($query, 1)) {
		$list_student[] = $row;
	}
	if ($list_student!= null && count($list_student) > 0) {
		$sv = $list_student[0];
	}
}
echo '<button class="button button1" onclick=\'window.open("message_box.php?username='.$sv['username'].'","_self")\'>Xem hộp thư</button><br/><br/>';//phai la username


echo '<button class="button button1" onclick=\'window.open("show_task.php?id='.$sv['id'].'","_self")\'>Xem bài tập</button><br/><br/>'; //id cung dc 
echo '<button class="button button1" onclick=\'window.open("solve_task.php?id='.$sv['id'].'","_self")\'>Giải bài tập</button>';

?>
</body>
</html>



