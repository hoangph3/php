<?php require_once 'utils.php';
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['username'])) {
  header("location: index.php");
}
else {
	$s_sender = $_SESSION['username'];
	
	$id = $_GET['id'];
	$sql = "select * from student where id=" .$id;
	$list_student = execute_result($sql) ;
	if ($list_student != null && count($list_student) > 0) {
		$sv        = $list_student[0];
		$s_username = $sv['username'];
	} else {
		$id = '';
	}

	$s_receiver = $s_username;

	if (isset($_POST['message'])) 
	{		
    $s_content = $_POST['content'];
		$sql = "insert into message(sender, receiver, content, time) 
		value ('$s_sender', '$s_receiver', '$s_content', NOW() )";
		execute($sql); 
		 
		if ($_SESSION['id']<500) header("location: admin.php");
		else header("location: user.php");
	}
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <title>Message</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/w3.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

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
      <a href="log_out.php" class="right">Log out</a>
    </div>
  </ul>

  <div class="row">
    <div class="side">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <img src="hack.png" width="250px" height="250px">
      <h5>While hack we dev - While dev we hack</h5>
    </div>
    <div class="main">
	  <h2>Send Message</h2>
	<form method="post" action="">
		<div class="w3-container">
			<label for="sender">From</label>
			<input required="true" type="text" class="w3-input w3-animate-input" style="width:50%" id="sender" name="sender" value="<?=$s_sender?>" readonly>
        </div><br/>
		<div class="w3-container">
			<label for="receiver">To</label>
			<input required="true" type="text" class="w3-input w3-animate-input" style="width:50%" id="receiver" name="receiver" value="<?=$s_username?>">
		</div><br/>
		<div class="w3-container">
			<label for="content">Content</label>
			<textarea name="content" id="content" class="w3-input w3-animate-input" style="width:50%" rows="10" cols="75" placeholder="Write something.."></textarea>
		</div><br/>
		<div class="w3-container">
            <input type="submit" class="w3-button w3-right w3-teal" name="message" value="Send >>"/>
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