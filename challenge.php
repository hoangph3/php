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
      echo '<br/><form class="w3-container" action="" method="post" enctype="multipart/form-data">
              <div class="w3-container">
                  <input class="w3-input w3-border" required="true" style="width:100%;" type="file" name="fileUpload" value="">
              </div><br/>
              <div class="w3-container">
                  <label for="suggest">Suggestion</label>
                  <textarea required="true" name="suggest" id="suggest" style="width:100%" rows="5" cols="50" placeholder="Write your hint.."></textarea>
              </div><br/>
              <div class="w3-container">
                  <input class="button w3-right" type="submit" name="up" value="Submit">
              </div>
          </form>';
      }
  
  if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
      if ($_FILES['fileUpload']['error'] > 0) {}
      else {
          move_uploaded_file($_FILES['fileUpload']['tmp_name'], './admin/challenge/' . $_FILES['fileUpload']['name']);
          $name_challenge = $_POST['nameChallenge'];
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
          <th>Your Hint</th>
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
              <td><button class="button button2" onclick=\'window.open("challenge_solve.php?id='.$idea['id'].'","_self")\'>Solve</button></td>
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

<?php
}