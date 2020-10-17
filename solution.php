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
    if ($_SESSION['id']<500) echo '<li><a href="admin.php">Home</a></li>';
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
      <h2>Upload Your Answer</h2>
      <form class="w3-container" action="" method="post" enctype="multipart/form-data">
          <div class="w3-container">
              <label for="assignment">Your Assignment</label>
              <input class="w3-input w3-border" type="text" id="assignment" name="assignment" style="width:100%;" value="<?= $your_task ?>" readonly>
          </div><br/>
          <div class="w3-container">
              <input class="w3-input w3-border" type="file" name="fileUpload" value=""><br/>
          </div>
          <div class="w3-container">
              <input class="w3-right" type="submit" name="up" value="Upload &raquo;">
          </div>
      </form>
    </div>
  </div>

  <?php 
  if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if(isset($_SESSION['username'])) $s_username = $_SESSION['username']; else $s_username='';
    if ($_FILES['fileUpload']['error'] > 0) {
      echo "<script>alert('Sorry, something went wrong !');</script>";
    }
    else {
      $folder_name = './uploads/solution/' .$your_task .'/';
      move_uploaded_file($_FILES['fileUpload']['tmp_name'], $folder_name . $_FILES['fileUpload']['name']);
      $s_filename = $_FILES['fileUpload']['name'];
      $sql = "insert into homework(task, username, filename, time) value ('$your_task', '$s_username', '$s_filename', NOW() )";
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
  <?php 
}