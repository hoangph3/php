<?php require_once 'utils.php';
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['username'])) {
  header("location: index.php");
}
else {
  if (isset($_GET['task'])){
    $your_task =$_GET['task'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Assignment Submission</title>
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
  <li><a href= <?php echo "admin.php"?> >Home</a></li>
  <div class="navbar">
    <a href="log_out.php" class="right">Log out</a>
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
    <h2>Show Submissions</h2>
    <div class="w3-container">
        <label for="assignment">Assignment</label>
        <input class="w3-input w3-border" type="text" id="assignment" name="assignment" style="width:100%;" value="<?= $your_task ?>" readonly>
    </div>
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

<?php
$dir = 'uploads/solution/' .$your_task .'/';
$all_files = scandir($dir);
$files = array_diff($all_files, array('.', '..')); 

$sql = "select * from homework where task = '$your_task' ";
$list_submit = execute_result($sql);
foreach ($list_submit as $submit) {
    echo '<tr>
        <td>'.$submit['username'].'</td>
        <td>'.$submit['filename'].'</td>
        <td>'.$submit['time'].'</td>'
        ."<td><a href='download.php?answer=".$dir.$submit['filename']."'>".$submit['filename']."</a></td>
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