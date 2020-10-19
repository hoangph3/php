<?php require_once 'utils.php';
session_start();
if(isset($_SESSION['level']) && $_SESSION['level'] == 0) {
  //Pagination
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  else {
    $page = 1;
  }
  $num_per_page = 05;
  $start_from = ($page - 1)*05;

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <title>Guest</title>
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
    <li><a href= <?php echo "user.php" ?> >Home</a></li>
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
      <h2 style="text-align:left;float:left;" >Students List</h2>
      <a style="text-align:right;float:right;" href= <?php echo "add_edit_student.php?id=".$_SESSION['id'] ?>
      class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align">Change info<i class="w3-padding fa fa-pencil"></i></a>
          <table class="styled-table">
          <thead>
              <tr>
                  <th>Username</th>
                  <th width="50"></th>
                  <th width="50"></th>
                  <th width="50"></th>
              </tr>
          </thead>
          <tbody>
  <?php
  $sql = "select * from user limit $start_from,$num_per_page";
  $list_student = execute_result($sql);
  foreach ($list_student as $sv) {
          echo '<tr>
                  <td>'.$sv['username'].'</td>
                  <td><button onclick=\'window.open("detail_info.php?id='.$sv['id'].'","_self")\'>Detail</button></td>
                  <td><button class="w3-disabled">Edit</button></td>
                  <td><button class="w3-disabled">Delete</button></td>                
                </tr>';
  }
  ?>
          </tbody>
          </table>
          <?php 
              $pr_query = "select * from user";
              $con = connect_db();
              $pr_result = mysqli_query($con, $pr_query);
              $total_record = mysqli_num_rows($pr_result);
              
              $total_page = ceil($total_record/$num_per_page);
              
              if($page > 1){
                echo "<a href='user.php?page=".($page-1)."' class='w3-button'>&laquo</a>";
              }
              
              for($i=1; $i<$total_page; $i++)
              {
                echo "<a href='user.php?page=".$i."' class='w3-button'>$i</a>";
              }

              if($i > $page){
                echo "<a href='user.php?page=".($page+1)."' class='w3-button'>&raquo</a>";
              }

          ?>
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
else {
  header("location: log_out.php");
}