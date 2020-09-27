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
<title>Submission</title>
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
  <li><a href= <?php echo "page_admin.php?id=" .$id ?>>Home</a></li>
  <li><a href= <?php echo "add_edit_student.php?id=" .$id ?>>Add Student</a></li>
  <li><a href= <?php echo "message_box.php?username=" .$gv['username']?> >Mailbox</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Assignment</a>
    <div class="dropdown-content">
      <a href= <?php echo "up_task.php?id=" .$id ?>>Create</a>
      <a href= <?php echo "show_answer.php?id=" .$id ?>>Show Submission</a>
    </div>
  </li>
  <li><a href= <?php echo "challenge.php?id=" .$id ?>>Challenge</a></li>
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
    <h2>Show Submission</h2>
        <table class="styled-table">
        <thead>
            <tr>
                <th>Username</th>
                <th>File name</th>
                <th>Time Submit</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>

<?php require_once 'utils.php';
$dir = "/admin/answer/";
$all_files = scandir($dir);
$files = array_diff($all_files, array('.', '..')); 

$sql = 'select * from homework';
$list_submit = execute_result($sql);
foreach ($list_submit as $submit) {
    echo '<tr>
        <td>'.$submit['username'].'</td>
        <td>'.$submit['filename'].'</td>
        <td>'.$submit['time'].'</td>'
        ."<td><a href='download.php?answer=".$submit['filename']."'>".$submit['filename']."</a></td>
          </tr>";
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
<?php 
}