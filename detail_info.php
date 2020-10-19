<?php require_once 'utils.php';
session_start();
if(isset($_SESSION['level']))  {
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
      <h5>While hack we dev - While dev we hack</h5>
    </div>
    <div class="main">
      <h2 style="text-align:left;float:left;" >Infomation</h2>
      <?php echo '<button style="text-align:right;float:right;" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align"
      <i class="w3-padding fa fa-pencil"></i> onclick=\'window.open("message.php?id='.$sv['id'].'","_self")\'
      >Send Message</button>';

  
    $id = '';
    if (isset($_GET['id'])) {
        $id          = $_GET['id'];
        $sql         = 'select * from user where id = '.$id;
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
  ?>
  <form class="w3-container">
    <div class="w3-container">
        <label for="username">Username</label>
        <input class="w3-input" type="text" style="width:100%" name="username" value="<?=$sv['username']?>" readonly><br/> 
    </div>
    <div class="w3-container">
        <label for="password">Password</label>
        <input class="w3-input" type="password" style="width:100%" name="password" value="<?=$sv['userpwd']?>" readonly><br/>
    </div>
    <div class="w3-container">
        <label for="fullname">Full name</label>
        <input class="w3-input" type="text" style="width:100%" name="fullname" value="<?=$sv['fullname']?>" readonly><br/> 
    </div>
    <div class="w3-container">
        <label for="email">Email</label>
        <input class="w3-input" type="email" style="width:100%" name="email" value="<?=$sv['email']?>" readonly><br/>
    </div>
    <div class="w3-container">
        <label for="phone">Phone</label>
        <input class="w3-input" type="text" style="width:100%" name="phone" value="<?=$sv['phone']?>" readonly><br/>
    </div>
</form>

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
else{
  header("location: log_out.php");
}



