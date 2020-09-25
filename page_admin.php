<?php require_once 'utils.php';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql = 'select * from teacher where id = '.$id;
	$list_teacher = execute_result($sql);
	if ($list_teacher!= null && count($list_teacher) > 0) {
		$gv = $list_teacher[0];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Adminstrator</title>
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
  <li><a href="challenge.php">Challenge</a></li>
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
                  '<p style="font-weight: bold;">*Email: '.$sv['email'].'</p>'.
                  '<p style="font-weight: bold;">*Phone: '.$sv['phone'].'</p>'.
                  '<a style="font-weight: bold; color: #ff5555;" href='.'message.php?id='.$gv['id'].'>Sendmail'.'</a>'.
                '</div>  
                </div>
                </td>
                <td width="10"><button style = "padding: 14px;" class="w3-btn w3-white w3-border w3-border-teal w3-round-large" onclick=\'window.open("input.php?id='.$sv['id'].'","_self")\'>Edit</button></td>
                <td width="10"><button style = "padding: 14px;" class="w3-btn w3-white w3-border w3-border-red w3-round-large" onclick="xoa_sv('.$sv['id'].')">Delete</button></td>                
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

<!--ham xoa sv-->
<script type="text/javascript">
		function xoa_sv(id) {
			if(confirm('Xác nhận xóa?')) {
				$.post('delete_student.php', {'id': id},
				function(data) {location.reload()})
			}	
		}
</script>