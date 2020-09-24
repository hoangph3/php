<?php
$conn = mysqli_connect('localhost','id14948603_root','Hoangmit28062017@','id14948603_dbsinhvien');

$s_username = $s_userpwd = $s_fullname = $s_email = $s_phone = '';

if (!empty($_POST)) {
	//xac thuc data va injection
	$s_id = '';
	$s_username = addslashes(isset($_POST['username']) ? $_POST['username'] : '');
	$s_userpwd = addslashes(isset($_POST['userpwd']) ? $_POST['userpwd'] : '');
	$s_fullname = addslashes(isset($_POST['fullname']) ? $_POST['fullname'] : '');
	$s_email = addslashes(isset($_POST['email']) ? $_POST['email'] : '');
	$s_phone = addslashes(isset($_POST['phone']) ? $_POST['phone'] : '');
	$s_id = addslashes(isset($_POST['id']) ? $_POST['id'] : '');

    // chi update, ko the insert
    if ($s_id != '') { 
		$sql = "update student set username = '$s_username', userpwd = '$s_userpwd', 
		fullname = '$s_fullname', email = '$s_email', phone = '$s_phone' where id = " .$s_id; //update khi sv ton tai (exist id)
	} 
	mysqli_query($conn, $sql);

	header('Location: sub.php?id='.$s_id);
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from student where id = '.$id; // . = noi chuoi
	$query = mysqli_query($conn, $sql);
	$list_student = [];
	while ($row = mysqli_fetch_array($query, 1)) {
		$list_student[] = $row;
	}
	if ($list_student != null && count($list_student) > 0) {
		$sv        = $list_student[0];
		$s_username = $sv['username'];
		$s_userpwd  = $sv['userpwd'];
		$s_fullname = $sv['fullname'];
		$s_email    = $sv['email'];
		$s_phone  = $sv['phone'];
	} else {
		$id = '';
	}
} ?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Cập nhật thông tin</title>
	<h1>Thông tin sinh viên</h1>
</head>
<body>
	<form method="post">
		<div class="input-group">
			<label for="username">Tên đăng nhập</label>
			<input type="number" name="id" value="<?=$id?>" style="display: none;">
			<input required="true" type="text" class="form-control" id="username" name="username" value="<?=$s_username?>" readonly>
		</div>
		<div class="input-group">
			<label for="userpwd">Mật khẩu</label>
			<input required="true" type="password" class="form-control" id="userpwd" name="userpwd" value="<?=$s_userpwd?>">
		</div>
		<div class="input-group">
			<label for="fullname">Họ tên</label>
			<input required="true" type="text" class="form-control" id="fullname" name="fullname" value="<?=$s_fullname?>" readonly>
		</div>
		<div class="input-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" value="<?=$s_email?>">
		</div>
		<div class="input-group">
			<label for="phone">Số điện thoại</label>
			<input type="text" class="form-control" id="phone" name="phone" value="<?=$s_phone?>">
		</div>
		<div class="input-group">
			<button class="button button4">Lưu</button>
		</div>
	</form>
</body>
</html>

