<?php require_once 'utils.php';
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['username'])) {
  header("location: index.php");
}
else {
  //Pagination
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  else {
    $page = 1;
  }
  $num_per_page = 02;
  $start_from = ($page - 1)*02;
  
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
      <img src="/css/hack.png" width="250px" height="250px">
      <p>While hack we dev - While dev we hack</p>
    </div>
    <div class="main">
      <h2>Challenge</h2>
  <?php 
  if ($_SESSION['id']>500) {
      echo ''; 
      }
  else {
      echo '<form class="w3-container" action="" method="post" enctype="multipart/form-data">
              <div class="w3-container">
                  <input class="w3-input w3-border" required="true" style="width:100%;" type="file" name="fileUpload" value="">
              </div><br/>
              <div class="w3-container">
                  <label for="suggest">Suggestion</label>
                  <textarea class="w3-input w3-border" required="true" name="suggest" id="suggest" style="width:100%" rows="5" cols="50" placeholder="Write your hint.."></textarea>
              </div><br/>
              <div class="w3-container">
                  <input class="button w3-right" type="submit" name="up" value="Submit">
              </div>
          </form>';
      }
  
  if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
      if ($_FILES['fileUpload']['error'] > 0) {
        echo "<script>alert('Can't Upload this file !');</script>";
      }
      else {
          $challenge = substr(md5(time()), 0, 10);
          $suggest = $_POST['suggest'];
          $folder_name = './uploads/challenge/' .$challenge .'/';
          $create_folder = mkdir($folder_name);
          move_uploaded_file($_FILES['fileUpload']['tmp_name'], $folder_name . $_FILES['fileUpload']['name']);  
      }
  }
  $sql = "insert into challenge(name, suggest) value('$challenge','$suggest')";
  if ($suggest != '') {
      execute($sql);
  }
  ?>
  <table class="styled-table">
      <thead>
        <tr>
          <th>Your Hint</th>
          <th width="50"></th>
        </tr>
      </thead>
      <tbody>
  <?php 
  $sql = "select * from challenge limit $start_from,$num_per_page";
  $list_challenge = execute_result($sql);
  foreach ($list_challenge as $quiz) {
  echo '<tr>
              <td>'.$quiz['suggest'].'</td>
              <td><button onclick=\'window.open("challenge_solve.php?id='.$quiz['id'].'","_self")\'>Solve</button></td>
          </tr>';
  }
  ?> 
      </tbody>
  </table>
  <?php 
              $pr_query = "select * from challenge";
              $con = connect_db();
              $pr_result = mysqli_query($con, $pr_query);
              $total_record = mysqli_num_rows($pr_result);
              
              $total_page = ceil($total_record/$num_per_page);
              
              if($page > 1){
                echo "<a href='challenge.php?page=".($page-1)."' class='w3-button'>&laquo</a>";
              }
              
              for($i=1; $i<$total_page; $i++)
              {
                echo "<a href='challenge.php?page=".$i."' class='w3-button'>$i</a>";
              }

              if($i > $page){
                echo "<a href='challenge.php?page=".($page+1)."' class='w3-button'>&raquo</a>";
              }
  ?>
  </body>
  </html>
  </div>
</div>
<div class="footer">
  <h2>Contact me</h2>
  <p>Viettel Cyber Security, 41st Floor, Keangnam 72 Landmark Building, Pham Hung Str., Nam Tu Liem Dist., Hanoi</p>
</div>

<?php
}