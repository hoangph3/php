<?php require_once 'utils.php';
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['username'])) {
  header("location: index.php");
}
else {
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Message</title>
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
	<?php 
    if ($_SESSION['id']<500) echo '<li><a href="admin.php">Home</a></li>';
    else echo '<li><a href="user.php">Home</a></li>';
    ?>
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
$s_username = $_SESSION['username'];
$sql = "select * from message where sender = '$s_username' "; 
$list_msg = execute_result($sql);
foreach ($list_msg as $msg) {
	echo '<tr>
			<td>'.$msg['sender'].'</td>
			<td>'.$msg['receiver'].'</td>
			<td>'.$msg['content'].'</td>
			<td>'.$msg['time'].'</td>
			<td><button onclick=\'window.open("message_edit.php?id='.$msg['id'].'","_self")\'>Edit</button></td>
			<td><button onclick="xoa_msg('.$msg['id'].')">Delete</button></td>
		</tr>';
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

$sql = "select * from message where receiver = '$s_username' "; 
$list_msg = execute_result($sql);

foreach ($list_msg as $msg) {
	echo '<tr>
			<td>'.$msg['sender'].'</td>
			<td>'.$msg['receiver'].'</td>
			<td>'.$msg['content'].'</td>
			<td>'.$msg['time'].'</td>
			<td><button class="w3-disabled">Edit</button></td>
			<td><button class="w3-disabled">Delete</button></td>
		</tr>';
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

<?php 
}
