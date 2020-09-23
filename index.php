<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Trang đăng nhập</title>
	<h1>Đăng nhập tài khoản</h1>
</head>
<body>
<?php require_once 'db_helper.php';
session_start();
if (isset($_POST['login'])) 
{
    $conn = mysqli_connect("127.0.0.1", "root", "", "dbsinhvien");
    $username = addslashes($_POST['username']);
    $userpwd = addslashes($_POST['userpwd']);
     
	$sql = "select * from teacher where username = '$username' and userpwd = '$userpwd' ";
	$query = mysqli_query($conn, $sql);
	$teacher = mysqli_fetch_array($query);
	
	$sql = "select * from student where username = '$username' and userpwd = '$userpwd' ";
	$query = mysqli_query($conn, $sql);
	$student = mysqli_fetch_array($query);
     
    if (($teacher['username'] == $username) && ($teacher['userpwd'] == $userpwd)){
        $_SESSION['username'] = $teacher['username'];
		$_SESSION['userpwd'] = $teacher['userpwd'];

		header("location: "."main.php?id=".$teacher['id']);
	}
	else if(($student['username'] == $username) && ($student['userpwd'] == $userpwd)){
        $_SESSION['username'] = $student['username'];
		$_SESSION['userpwd'] = $student['userpwd'];
		
		header("location: "."sub.php?id=".$student['id']);
		die();
	}
	else {
		header("location: index.php");
	}
}
?>
	<form method="post" action="index.php">
		<div class="input-group">
			<label for="username">Tên đăng nhập</label>
			<input required="true" type="text" class="form-control" id="username" name="username">
		</div>
		<div class="input-group">
			<label for="userpwd">Mật khẩu</label>
			<input required="true" type="password" class="form-control" id="userpwd" name="userpwd">
		</div>
		<div class="input-group">
                <input type="submit" class="button buton1" name="login" value="Đăng nhập"/>
		</div>
	</form>
</body>
</html>
