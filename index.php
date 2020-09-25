<?php require_once 'utils.php';
session_start();
if (isset($_POST['dangnhap'])) 
{
    $connect = mysqli_connect("127.0.0.1", "root", "", "dbsinhvien");

    $s_username = addslashes($_POST['username']);
    $s_userpwd = addslashes($_POST['userpwd']);
     
	$sql_teacher = "select * from teacher where username = '$s_username' and userpwd = '$s_userpwd' ";
	$query_teacher = mysqli_query($connect, $sql_teacher);
	$row_teacher = mysqli_fetch_array($query_teacher);
	
	$sql_student = "select * from student where username = '$s_username' and userpwd = '$s_userpwd' ";
	$query_student = mysqli_query($connect, $sql_student);
	$row_student = mysqli_fetch_array($query_student);
     
    if (($row_teacher['username'] == $s_username) && ($row_teacher['userpwd'] == $s_userpwd)){
        $_SESSION['username'] = $row_teacher['username'];
		$_SESSION['userpwd'] = $row_teacher['userpwd'];

		header("location: "."page_admin.php?id=".$row_teacher['id']);
	}
	else if(($row_student['username'] == $s_username) && ($row_student['userpwd'] == $s_userpwd)){
        $_SESSION['username'] = $row_student['username'];
		$_SESSION['userpwd'] = $row_student['userpwd'];
		
		header("location: "."page_user.php?id=".$row_student['id']);
		die();
	}
	else {
		header("location: index.php");
	}
}
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="/css/index.css">
    </head>
    <body>
        <header>
            <img src="/css/logo.png" width="64px" height="64px">
            <h1>Sign in to VCS</h1>
        </header>
        <form method="post" action="index.php">
		<div id="loginbox">
            <label id="username">
                <p>Username</p>
                <input required="true" type="text" id="username" name="username">
            </label>
            <label id="userpwd">
                <p>Password</p>
                <input required="true" type="password" id="userpwd" name="userpwd">
            </label>
            <input type="submit" name="dangnhap" value="Sign in">
        </div>  
		</form>
    </body>
</html>
