<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Message</title>
	<h1>Trang gửi tin nhắn</h1>
</head>
<body>
<?php require_once 'utils.php';

//Xử lý đăng nhập
if (isset($_POST['message'])) 
{
    //Lấy dữ liệu nhập vào tu input
    $s_sender = addslashes($_POST['sender']);
	$s_senderpwd = addslashes($_POST['senderpwd']);

	$s_receiver = addslashes($_POST['receiver']);
    $s_content = $_POST['content'];
	 
	//truy xuat thong tin nguoi gui
	$sql_teacher = "select * from teacher WHERE username = '$s_sender' and userpwd = '$s_senderpwd' ";
	$row_teacher = execute_result($sql_teacher);
	$list_teacher = $row_teacher[0];
	$user_teacher = $list_teacher['username']; //tdn cua teacher

	$sql_student = "select * from student WHERE username = '$s_sender' and userpwd = '$s_senderpwd' ";
	$row_student = execute_result($sql_student);
	$list_student = $row_student[0];
	$user_student = $list_student['username']; //tdn cua student
		
	if (!empty($user_student))
	{
		$sql = "insert into message(sender, receiver, content, time) 
		value ('$user_student', '$s_receiver', '$s_content', NOW())";
		execute($sql); 
		//echo '<div><h3>Gửi tin nhắn thành công!</h3></div>';
		header("location: sub.php?id=".$list_student['id']);		
	}	
	else if (!empty($user_teacher)){
		$sql = "insert into message(sender, receiver, content, time) 
		value ('$user_teacher', '$s_receiver', '$s_content', NOW())";
		execute($sql); 
		//echo '<div><h3>Gửi tin nhắn thành công!</h3></div>';
		header("location: main.php?id=".$list_teacher['id']);
	}
	else {
		echo '<div><h3>Kiểm tra lại thông tin người gửi!</h3></div>';
	}
}
?>
	<form method="post" action="message.php">
		<div class="input-group">
			<label for="sender">Người gửi</label>
			<input required="true" type="text" class="form-control" id="sender" name="sender"></input>
        </div>
        <div class="input-group">
			<label for="senderpwd">Mật khẩu</label>
			<input required="true" type="password" class="form-control" id="senderpwd" name="senderpwd"></input>
		</div>
		<div class="input-group">
			<label for="receiver">Người nhận</label>
			<input required="true" type="text" class="form-control" id="receiver" name="receiver"></input>
		</div>
		<div class="input-group">
			<label for="content">Nội dung</label>
			<textarea require="true" name="content" id="content" rows="10" cols="75"></textarea>
		</div>
		<div class="input-group">
            <input type="submit" class="button buton1" name="message" value="Gửi ngay!"/>
		</div>
	</form>
</body>
</html>
