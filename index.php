<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Trang đăng nhập</title>
	<h1>Đăng nhập tài khoản</h1>
</head>
<body>
<?php require_once 'utils.php';
session_start();
 
//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
    $connect = mysqli_connect("127.0.0.1", "root", "", "dbsinhvien");

	// ktra connect
	if (!$connect) {
	    die("Connection failed: " . mysqli_connect_error());
	}

    //Lấy dữ liệu nhập vào tu input
    $s_username = addslashes($_POST['username']);
    $s_userpwd = addslashes($_POST['userpwd']);
     
	//kiem tra thong tin giao vien
	$sql_teacher = "select * from teacher where username = '$s_username' and userpwd = '$s_userpwd' ";
	$query_teacher = mysqli_query($connect, $sql_teacher);
	$row_teacher = mysqli_fetch_array($query_teacher);
	
	//kiem tra thong tin sinh vien
	$sql_student = "select * from student where username = '$s_username' and userpwd = '$s_userpwd' ";
	$query_student = mysqli_query($connect, $sql_student);
	$row_student = mysqli_fetch_array($query_student);
     
    if (($row_teacher['username'] == $s_username) && ($row_teacher['userpwd'] == $s_userpwd)){
        $_SESSION['username'] = $row_teacher['username'];
		$_SESSION['userpwd'] = $row_teacher['userpwd'];

		header("location: "."main.php?id=".$row_teacher['id']);
	}
	else if(($row_student['username'] == $s_username) && ($row_student['userpwd'] == $s_userpwd)){
        $_SESSION['username'] = $row_student['username'];
		$_SESSION['userpwd'] = $row_student['userpwd'];
		
		header("location: "."sub.php?id=".$row_student['id']);
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
			<input required="true" type="password" class="form-control" id="userpwd" name="userpwd"></input>
		</div>
		<div class="input-group">
                <input type="submit" class="button buton1" name="dangnhap" value="Đăng nhập"/>
		</div>
	</form>
</body>
</html>
