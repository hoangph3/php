<?php require_once 'utils.php';

$s_sender = $s_receiver = $s_content = '';

if (!empty($_POST)) {

	//xac thuc data va injection
	$s_id = '';
	$s_sender = addslashes(isset($_POST['sender']) ? $_POST['sender'] : '');
	$s_receiver = addslashes(isset($_POST['receiver']) ? $_POST['receiver'] : '');
	$s_content = $_POST['content'];

	$s_id = addslashes(isset($_POST['id']) ? $_POST['id'] : '');

	if ($s_id != '') { //sua tin nhan
		$sql = "update message set content = '$s_content', time = NOW() where id = " .$s_id;
	}
	
	execute($sql);
	header('Location: message_box.php?username='.$s_sender);
	die();
}

$id = '';
if (isset($_GET['id'])) {

	$id          = $_GET['id'];
	$sql         = 'select * from message where id = '.$id; // . = noi chuoi
	$list_msg = execute_result($sql);
	
	if ($list_msg != null && count($list_msg) > 0) {
		$msg       = $list_msg[0];
		$s_sender = $msg['sender'];
		$s_receiver  = $msg['receiver'];
		$s_content = $msg['content'];
		$s_date  = $msg['date'];
	} else {
		$id = '';
	}
} ?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/index.css">
<html>
<head>
	<title>Cập nhật thông tin</title>
	<h1>Thông tin sinh viên</h1>
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
			<button class="button button4">Lưu</button>
		</div>
	</form>
</body>
</html>

