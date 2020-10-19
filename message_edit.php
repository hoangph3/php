<?php require_once 'utils.php';
session_start();
if(isset($_SESSION['level'])) {
	$s_sender = $s_receiver = $s_content = '';
	if (!empty($_POST)) {
		$s_id = '';
		$s_sender = addslashes(isset($_POST['sender']) ? $_POST['sender'] : '');
		$s_receiver = addslashes(isset($_POST['receiver']) ? $_POST['receiver'] : '');
		$s_content = $_POST['content'];

		$s_id = addslashes(isset($_POST['id']) ? $_POST['id'] : '');
		if ($s_id != '') { 
			$sql = "update message set content = '$s_content', time = NOW() where id = " .$s_id;
		}
		execute($sql);
		header('Location: message_box.php');
		die();
	}
	$id = '';
	if (isset($_GET['id'])) {
		$id          = $_GET['id'];
		$sql         = 'select * from message where id = '.$id; 
		$list_msg = execute_result($sql);
		if ($list_msg != null && count($list_msg) > 0) {
			$msg       = $list_msg[0];
			$s_sender = $msg['sender'];
			$s_receiver  = $msg['receiver'];
			$s_content = $msg['content'];
			$s_date  = $msg['time'];
		} else {
			$id = '';
		}
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
    if ($_SESSION['level'] == 1) echo '<li><a href="admin.php">Home</a></li>';
    else echo '<li><a href="user.php">Home</a></li>';
	?>
	<li><a href= <?php echo "message_box.php"?> >Mailbox</a></li>
	<li><a href= <?php echo "assignment.php"?> >Assignment</a></li>
	<li><a href="challenge.php">Challenge</a></li>
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
	  <h2>Edit Message</h2>
	<form method="post">
		<div class="w3-container">
			<label for="sender">From</label>
			<input type="number" name="id" value="<?=$id?>" style="display: none;">
			<input required="true" type="text" class="w3-input w3-animate-input" style="width:50%" id="sender" name="sender" value="<?=$s_sender?>" readonly>
        </div><br/>
		<div class="w3-container">
			<label for="receiver">To</label>
			<input required="true" type="text" class="w3-input w3-animate-input" style="width:50%" id="receiver" name="receiver" value="<?=$s_receiver?>" readonly>
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
else {
	header("location: log_out.php");
}

