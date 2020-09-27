<?php require_once 'utils.php';
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['username'])) {
  header("location: index.php");
}
else {
	$s_username = $s_userpwd = $s_fullname = $s_email = $s_phone = '';
	if (!empty($_POST)) {
		$s_id = '';
		$s_username = addslashes(isset($_POST['username']) ? $_POST['username'] : '');
		$s_userpwd = addslashes(isset($_POST['userpwd']) ? $_POST['userpwd'] : '');
		$s_fullname = addslashes(isset($_POST['fullname']) ? $_POST['fullname'] : '');
		$s_email = addslashes(isset($_POST['email']) ? $_POST['email'] : '');
		$s_phone = addslashes(isset($_POST['phone']) ? $_POST['phone'] : '');
		$s_id = addslashes(isset($_POST['id']) ? $_POST['id'] : '');

		if ($s_id != '') { 
			$sql = "update student set username = '$s_username', userpwd = '$s_userpwd', 
			fullname = '$s_fullname', email = '$s_email', phone = '$s_phone' where id = " .$s_id; 
		} else {
			$sql = "insert into student(username, userpwd, fullname, email, phone) 
			value ('$s_username', '$s_userpwd', '$s_fullname', '$s_email', '$s_phone')"; 
		}
		execute($sql);
		if ($_SESSION['id']<500) header("location: admin.php");
		else header("location: user.php");
		die();
	}
	$id = '';
	if (isset($_GET['id'])) {
		$id          = $_GET['id'];
		$sql         = 'select * from student where id = '.$id; 
		$list_student = execute_result($sql) ;
		if ($list_student != null && count($list_student) > 0) {
			$sv        = $list_student[0];
			$s_username = $sv['username'];
			$s_userpwd  = $sv['userpwd'];
			$s_fullname = $sv['fullname'];
			$s_email    = $sv['email'];
			$s_phone  = $sv['phone'];
		} else {
			$id = '';
		}
	} ?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>Adminstrator</title>
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
		<img src="/css/hack.png" width="250px" height="250px">
		<p>While hack we dev - While dev we hack</p>
	</div>
	<div class="main">
		<h2>Update Students</h2><br/>
		<form class="w3-container" method="post">
			<div class="w3-container">
				<label for="username">Username</label>
				<input type="number" name="id" value="<?=$id?>" style="display: none;">
				<?php 
				if ($_SESSION['id']<500) { ?>
				<input required="true" class="w3-input w3-animate-input" type="text" style="width:50%" id="username" name="username" value="<?=$s_username?>"><br/> 
				<?php }
				else { ?> 
				<input required="true" class="w3-input w3-animate-input" type="text" style="width:50%" id="username" name="username" value="<?=$s_username?>" readonly><br/> 
				<?php } ?>
			</div>
			<div class="w3-container">
				<label for="userpwd">Password</label>
				<input required="true" class="w3-input w3-animate-input" type="password" style="width:50%" id="userpwd" name="userpwd" value="<?=$s_userpwd?>"><br/>
			</div>
			<div class="w3-container">
				<label for="fullname">Full name</label>
				<?php 
				if ($_SESSION['id']<500) { ?>
				<input required="true" class="w3-input w3-animate-input" type="text" style="width:50%" id="fullname" name="fullname" value="<?=$s_fullname?>"><br/> 
				<?php }
				else { ?>
				<input required="true" class="w3-input w3-animate-input" type="text" style="width:50%" id="fullname" name="fullname" value="<?=$s_fullname?>" readonly><br/> 
				<?php } ?>
			</div>
			<div class="w3-container">
				<label for="email">Email</label>
				<input class="w3-input w3-animate-input" type="email" style="width:50%" name="email" value="<?=$s_email?>"><br/>
			</div>
			<div class="w3-container">
				<label for="phone">Phone</label>
				<input class="w3-input w3-animate-input" type="text" style="width:50%" id="phone" name="phone" value="<?=$s_phone?>"><br/>
			</div>
			<div class="w3-container">
				<button class="w3-button w3-right w3-teal">Submit &raquo;</button>
			</div>
		</form>     
	</div>
	</div>

	<div class="footer">
	<h2>Contact me</h2>
	<p>Viettel Cyber Security, 41st Floor, Keangnam 72 Landmark Building, Pham Hung Str., Nam Tu Liem Dist., Hanoi</p>
	</div>
	</body>
	</html>

	<?php 
}