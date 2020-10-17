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
  <title>View Details</title>
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
      <img src="hack.png" width="250px" height="250px">
      <h5>While hack we dev - While dev we hack</h5>
    </div>
    <div class="main">
      <h2 style="text-align:left;float:left;" >Infomation</h2>
          <table class="styled-table">
          <thead>
              <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Full name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th width="140"></th>
              </tr>
          </thead>
          <tbody>
  <?php
    $id = '';
    if (isset($_GET['id'])) {
        $id          = $_GET['id'];
        $sql         = 'select * from student where id = '.$id;
        $list_student = execute_result($sql);
        
        if ($list_student != null && count($list_student) > 0) {
            $sv        = $list_student[0];
            $s_username = $sv['username'];
            $s_userpwd  = $sv['userpwd'];
            $s_fullname = $sv['fullname'];
            $s_email    = $sv['email'];
            $s_phone  = $sv['phone'];
        } else {
            $id = '';
        }
    } 
  $list_student = execute_result($sql);
  foreach ($list_student as $sv) {
          echo '<tr>
                  <td>'.$sv['username'].'</td>
                  <td>'.$sv['userpwd'].'</td>
                  <td>'.$sv['fullname'].'</td>
                  <td>'.$sv['email'].'</td>
                  <td>'.$sv['phone'].'</td>
                  <td><button onclick=\'window.open("message.php?id='.$sv['id'].'","_self")\'>Send Message</button></td>
                </tr>';
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
<?php
}