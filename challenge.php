<?php require_once 'utils.php';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql = 'select * from student where id = '.$id;
	$list_student = execute_result($sql);
	if ($list_student!= null && count($list_student) > 0) {
		$sv = $list_student[0];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Challenge</title>
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
  <li><a href=<?php echo "only_edit_student.php?id=" .$id ?>>Change info</a></li>
  <li><a href= <?php echo "message_box.php?username=" .$sv['username']?> >Mailbox</a></li>
  <li><a href= "" >Challenge</a></li>
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
    <h2>Solve Challenge</h2>
<?php require_once 'utils.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo '<br/>'; 
    }
else {
    echo '<form class="w3-container" action="" method="post" enctype="multipart/form-data">
            <div class="w3-container">
                <input style="width:100%;" class="w3-input w3-border w3-teal" type="file" name="fileUpload" value=""><br/>
            </div>
            <div class="w3-container">
                <label for="suggest">Suggestion</label>
                <input style="width:100%;" class="w3-input w3-border w3-teal" type="text" name="suggest" id="suggest">
            </div>
            <div class="w3-container">
                <input class="w3-button w3-right w3-teal" type="submit" name="up" value="Submit">
            </div>
        </form>';
    }
?>
<?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0) {
        echo '<a style="font-size:30;" href="./challenge_add.php">Đăng lại</a><br/>';
    }
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], './admin/challenge/' . $_FILES['fileUpload']['name']);
        $suggest = $_POST['suggest'];
    }
}
$sql = "insert into challenge(suggest) value('$suggest')";
if ($suggest != '') {
    execute($sql);
}
?>
<table class="styled-table">
		<thead>
			<tr>
				<th>Hint</th>
				<th width="50"></th>
			</tr>
		</thead>
		<tbody>
<?php 
$sql = "select * from challenge";
$list_suggest = execute_result($sql);
foreach ($list_suggest as $idea) {
echo '<tr>
            <td>'.$idea['suggest'].'</td>
            <td><button class="button button2" onclick=\'window.open("challenge_solve.php?id='.$id.'","_self")\'>Solve</button></td>
        </tr>';
}
?> 
        </tbody>
</table>

</body>
</html>
</div>
</div>
<div class="footer">
  <h2>Contact me</h2>
  <p>Viettel Cyber Security, 41st Floor, Keangnam 72 Landmark Building, Pham Hung Str., Nam Tu Liem Dist., Hanoi</p>
</div>