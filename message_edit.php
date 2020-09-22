<?php require_once 'utils.php';

$s_sender = $s_receiver = $s_content = '';

if (!empty($_POST)) {
	
	//xac thuc data va injection
	$s_id = '';
	$s_sender = addslashes(isset($_POST['sender']) ? $_POST['sender'] : '');
	$s_receiver = addslashes(isset($_POST['receiver']) ? $_POST['receiver'] : '');
	$s_content = addslashes(isset($_POST['content']) ? $_POST['content'] : '');
	$s_id = addslashes(isset($_POST['id']) ? $_POST['id'] : '');

	if ($s_id != '') { 
		$sql = "update message set content = '$s_content', date = NOW() where id = " .$s_id;
	} 
	execute($sql);	
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from message where id = '.$id;
	$list_msg 	 = execute_result($sql);

	if ($list_msg != null && count($list_msg) > 0) {
		$msg        = $list_msg[0];
		$s_sender = $msg['sender'];
		$s_receiver = $msg['receiver'];
		$s_content = $msg['content'];
	} 
	else {
		$id = '';
	}
} 
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Sửa tin nhắn</title>
    <h1>Sửa tin nhắn</h1>
    <!-- js de viet ham script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<form method="post">
		<div class="input-group">
			<label for="sender">Người gửi</label>
			<input type="number" name="id" value="<?=$id?>" style="display: none;">
			<input required="true" type="text" class="form-control" id="sender" name="sender" value="<?=$s_sender?>" readonly>
		</div>
		<div class="input-group">
			<label for="receiver">Người nhận</label>
			<input required="true" type="text" class="form-control" id="receiver" name="receiver" value="<?=$s_receiver?>" readonly>
		</div>
		<div class="input-group">
			<label for="content">Nội dung</label>
			<textarea require="true" name="content" id="content" rows="10" cols="75"></textarea>
		</div>
		<div class="input-group">
			<button class="button button4">Lưu lại</button>
		</div>
	</form>
</body>
</html>

