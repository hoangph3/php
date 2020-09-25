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
<title>Guest</title>
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
  <li><a href=<?php echo "input_sub.php?id=" .$id ?>>Change info</a></li>
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
    <h2>Students List</h2>
        <table class="styled-table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Full name</th>
                <th></th>
                <th width="100"></th>
            </tr>
        </thead>
        <tbody>
<?php
$sql = 'select * from student';
$list_student = execute_result($sql);
foreach ($list_student as $sv) {
        echo '<tr>
                <td>'.$sv['username'].'</td>
                <td>'.$sv['fullname'].'</td>
				<td width="10">
				<div class="dropdown" >
                <button class="dropbtn w3-white w3-border w3-border-indigo w3-round-large">Detail</button>
                  <div class="dropdown-content">
                  <p style="font-weight: bold;">*Password: '.$sv['userpwd'].'</p>'.
                  '<p style="font-weight: bold;">*Email: '.'******'.'</p>'.
                  '<p style="font-weight: bold;">*Phone: '.$sv['phone'].'</p>'.
                  '<a style="font-weight: bold; color: #ff5555;" href='.'message.php?id='.$sv['id'].'>Sendmail'.'</a>'.
                '</div>  
                </div>
				</td>
				<td></td>
              </tr>';
}
?>
        </tbody>
        </table>
      <h2>Assignment</h2>
      <table class="styled-table">
      <thead>
          <tr>
              <th width=100%>Task</th>
          </tr>
      </thead>
      <tbody>
<?php 
$dir = "./uploads/";
$all_files = scandir($dir);
$files = array_diff($all_files, array('.', '..')); 
foreach($files as $file){
  echo "<tr><td><a href='download.php?file=".$file."'>".$file."</a></td>
  </tr>";
}
?>
      </tbody>
	    </table>
    
  </div>
</div>

<div class="footer">
  <h2>Contact me</h2>
  <p>Viettel Cyber Security, 41st Floor, Keangnam 72 Landmark Building, Pham Hung Str., Nam Tu Liem Dist., Hanoi</p>
</div>
</body>
</html>