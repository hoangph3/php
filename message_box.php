<!DOCTYPE html>
<html lang="en">
<head>
<title>Message Box</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/w3.css">
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="header">
  <h1>Viettel Cyber Security</h1>
  <p>BigData and Machine Learning</p>
</div>

<ul>
  <li><a href= <?php echo "page_user.php?id=" .$id ?>>Home</a></li>
  <li><a href= <?php echo "only_edit_student.php?id=" .$id ?>>Change info</a></li>
  <li><a href= <?php echo "message_box.php?username=" .$sv['username']?> >Mailbox</a></li>
  <li><a href=  <?php echo "challenge.php?id=" .$id ?> >Challenge</a></li>
  <div class="navbar">
    <a href="index.php" class="right">Log out</a>
  </div>
</ul>

<div class="row">
  <div class="side">
    <h2>About Me</h2>
    <h5>Photo of me:</h5>
    <img src="/css/hack.png" width="200px" height="200px">
    <p>While hack we dev - While dev we hack</p>
  </div>
  <div class="main">
    <h2>Sent</h2>
        <table class="styled-table">
        <thead>
            <tr>
				<th>From</th>
				<th>To</th>
				<th width=600>Content</th>
				<th width=200>Time</th>
				<th width=10></th>
				<th width=10></th>
            </tr>
        </thead>
        <tbody>

<?php require_once 'utils.php'; 
if (isset($_GET['username'])) {
    $s_username = $_GET['username']; 
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
}
?>
        </tbody>
        </table>
      <h2>Inbox</h2>
      <table class="styled-table">
		<thead>
			<tr>
				<th>From</th>
				<th>To</th>
				<th width=600>Content</th>
				<th width=200>Time</th>
				<th width=10></th>
				<th width=10></th>
			</tr>
		</thead>
		<tbody>
<?php 
if (isset($_GET['username'])) {
    $s_username = $_GET['username']; 
	$sql = "select * from message where receiver = '$s_username' "; 
    $list_msg = execute_result($sql);
    
	foreach ($list_msg as $msg) {
		echo '<tr>
				<td>'.$msg['sender'].'</td>
				<td>'.$msg['receiver'].'</td>
				<td>'.$msg['content'].'</td>
				<td>'.$msg['time'].'</td>
			</tr>';
	}
}
?>
		</tbody>
	    </table>
  </div>
</div>
</body>
</html>
<div class="footer">
  <h2>Contact me</h2>
  <p>Viettel Cyber Security, 41st Floor, Keangnam 72 Landmark Building, Pham Hung Str., Nam Tu Liem Dist., Hanoi</p>
</div>

<!-- ham xoa tin nhan -->
<script type="text/javascript">
		function xoa_msg(id) {
			if(confirm('Xác nhận xóa?')) {
				$.post('message_delete.php', {'id': id},
				function(data) {location.reload()})
			}	
		}
</script>
