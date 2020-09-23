<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Xác thực thông tin</title>
	<h1>Nhập thông tin ban đầu</h1>
</head>
<body>
<?php require_once 'db_helper.php';
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
	
	//kiem tra thong tin sinh vien
	$sql_student = "select * from student where username = '$s_username' and userpwd = '$s_userpwd' ";
	$query_student = mysqli_query($connect, $sql_student);
	$row_student = mysqli_fetch_array($query_student);
     
	if(($row_student['username'] == $s_username) && ($row_student['userpwd'] == $s_userpwd)){
        $_SESSION['username'] = $row_student['username'];
		$_SESSION['userpwd'] = $row_student['userpwd'];
		
		header("location: "."input_sub.php?id=".$row_student['id']);
		die();
	}
	else {
		echo '<div><h3>Thông tin không đúng, không thể thay đổi!</h3></div>';
	}
}
?>
	<form method="post">
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
