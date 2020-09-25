<!DOCTYPE html>
<html lang="en">
<head>
<title>Solve Assignment</title>
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
    <h2>Upload Your File</h2>
    <form class="w3-container" action="" method="post" enctype="multipart/form-data">
        <div class="w3-container">
            <input class="w3-input w3-border w3-teal" type="file" name="fileUpload" value=""><br/>
        </div>
        <div class="w3-container">
            <input class="w3-button w3-right w3-teal" type="submit" name="up" value="Upload &raquo;">
        </div>
    </form>
  </div>
</div>

<?php require_once 'utils.php';
$id = '';
if (isset($_POST['up']) && isset($_FILES['fileUpload']) && isset($_GET['id'])) {
    $id          = $_GET['id'];
	$sql         = 'select * from student where id = '.$id;
	$list_student = execute_result($sql);
	if ($list_student != null && count($list_student) > 0) {
		$sv        = $list_student[0];
        $s_username = $sv['username'];
    }
    if ($_FILES['fileUpload']['error'] > 0) {
        echo "Upload không thành công <br/>";
        echo '<a style="font-size:30;" href="./up_answer.php?id='.$id.'">Đăng lại</a><br/>';
    }
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'admin/answer/' . $_FILES['fileUpload']['name']);
        $s_filename = $_FILES['fileUpload']['name'];
        echo "Upload thành công <br/>";
        $sql = "insert into homework(username, filename, time) value ('$s_username', '$s_filename', NOW())";
        execute($sql);
    }
}
?>
</body>
</html>
<div class="footer">
  <h2>Contact me</h2>
  <p>Viettel Cyber Security, 41st Floor, Keangnam 72 Landmark Building, Pham Hung Str., Nam Tu Liem Dist., Hanoi</p>
</div>