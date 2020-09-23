<!DOCTYPE html>
<style>
    <?php require 'index.css'; ?>
    <?php require_once 'utils.php'; ?>
</style>
<html>
<head>
	<title>Hộp thư</title>
	<div>
		<h1 style="float: left;">Tin nhắn đã gửi</h1>
	</div>
	<!-- js de viet ham script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="styled-table">
		<thead>
			<tr>
				<th>Người gửi</th>
				<th>Người nhận</th>
				<th width=600>Nội dung</th>
				<th width=200>Thời gian</th>
				<th width=10></th>
				<th width=10></th>
			</tr>
		</thead>
		<tbody>

<?php
if (isset($_GET['username'])) {
    
    $s_username = $_GET['username']; //ten de trich xuat table

    //lay thong tin tu db
	$sql = "select * from message where sender = '$s_username' "; 
    $list_msg = execute_result($sql);
    
	foreach ($list_msg as $msg) {
		echo '<tr>
				<td>'.$msg['sender'].'</td>
				<td>'.$msg['receiver'].'</td>
				<td>'.$msg['content'].'</td>
				<td>'.$msg['time'].'</td>
				<td><button class="button button2" onclick=\'window.open("message_edit.php?id='.$msg['id'].'","_self")\'>Sửa</button></td>
				<td><button class="button button3" onclick="xoa_msg('.$msg['id'].')">Xóa</button></td>
			</tr>';
	}
?>
		</tbody>
	</table>
</html>


<!-- ham xoa tin nhan -->
<script type="text/javascript">
		function xoa_msg(id) {
			if(confirm('Xác nhận xóa?')) {
				$.post('message_delete.php', {'id': id},
				function(data) {location.reload()})
			}	
		}
</script>
<?php }
?>

<!DOCTYPE html>
<style>
    <?php require 'index.css'; ?>
    <?php require_once 'utils.php'; ?>
</style>
<html>
<head>
	<title>Hộp thư</title>
	<div>
		<h1 style="float: left;">Tin nhắn đã gửi</h1>
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
				<th>Người gửi</th>
				<th>Người nhận</th>
				<th width=600>Nội dung</th>
				<th width=200>Thời gian</th>
				<th width=10></th>
				<th width=10></th>
			</tr>
		</thead>
		<tbody>

<?php
if (isset($_GET['username'])) {
    
    $s_username = $_GET['username']; //ten de trich xuat table

    //lay thong tin tu db
	$sql = "select * from message where sender = '$s_username' "; 
    $list_msg = execute_result($sql);
    
	foreach ($list_msg as $msg) {
		echo '<tr>
				<td>'.$msg['sender'].'</td>
				<td>'.$msg['receiver'].'</td>
				<td>'.$msg['content'].'</td>
				<td>'.$msg['time'].'</td>
				<td><button class="button button2" onclick=\'window.open("message_edit.php?id='.$msg['id'].'","_self")\'>Sửa</button></td>
				<td><button class="button button3" onclick="xoa_msg('.$msg['id'].')">Xóa</button></td>
			</tr>';
	}
?>
		</tbody>
	</table>
</html>
<?php } 



