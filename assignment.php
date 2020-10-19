<?php require_once 'utils.php';
session_start();
if(isset($_SESSION['level']))  {
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  else {
    $page = 1;
  }
  $num_per_page = 03;
  $start_from = ($page - 1)*03;
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Assignment</title>
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
    <p>While hack we dev - While dev we hack</p>
  </div>
  <div class="main">
    <?php 
    if ($_SESSION['level'] == 0) {
      echo ''; 
      }
  else {
      echo '<h2>Create Assignment</h2>
            <form class="w3-container" action="" method="post" enctype="multipart/form-data">
              <div class="w3-container">
                <input class="w3-input w3-border" type="file" name="fileUpload" value="">
              </div><br/>
              <div class="w3-container">
                <input class="button w3-right" type="submit" name="up" value="Upload &raquo;">
              </div>
            </form>';
}
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0) {
      echo "<script>alert('Sorry, something went wrong !');</script>";
    }
    else { 
      $file_name = $_FILES['fileUpload']['name'];
      $folder_name = './uploads/solution/' .$_FILES['fileUpload']['name'] .'/';
      $create_folder = mkdir($folder_name);
      move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/assignment/' . $_FILES['fileUpload']['name']);
    }
}
?>
    <h2>Your Assignment</h2>
    <table class="styled-table">
		<thead>
			<tr>
        <th width="600">Assignment</th>
        <th width="150"></th>
        <th width="50"></th>
			</tr>
		</thead>
		<tbody>
<?php 

$dir = "./uploads/assignment/";
$all_files = scandir($dir);
$files = array_diff($all_files, array('.', '..')); 
$split_files = array_slice($files, $start_from, $num_per_page);

foreach($split_files as $file){
  echo "<tr><td><a href='download.php?file=".$file."'>".$file."</a></td>";
  if ($_SESSION['level'] == 1) {
    echo '<td><button onclick=\'window.open("submission.php?task='.$file.'","_self")\'>View Submissions</button></td>';
  }
  else {
    echo '<td><button class="w3-button w3-disabled">View Submissions</button></td>';
  }
  echo '<td><button onclick=\'window.open("solution.php?task='.$file.'","_self")\'>Submit</button></td>
    </tr>';
}
?>
		</tbody>
	  </table>
    <?php 
        $total_page = ceil(count($files)/$num_per_page);

        if($page > 1){
          echo "<a href='assignment.php?page=".($page-1)."' class='w3-button'>&laquo</a>";
        }
        
        for($i=1; $i<$total_page; $i++)
        {
          echo "<a href='assignment.php?page=".$i."' class='w3-button'>$i</a>";
        }

        if($i > $page){
          echo "<a href='assignment.php?page=".($page+1)."' class='w3-button'>&raquo</a>";
        }
    ?>
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
else{
  header("location: log_out.php");
}
