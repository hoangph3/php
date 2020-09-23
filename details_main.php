<?php require_once 'utils.php';

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
?>
<!DOCTYPE html>
<html>

<head>
  <title>Thông tin chi tiết</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="lib/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="lib/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="lib/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="lib/bootstrap.min.js"></script>
</head>

<body>
    <div class="row justify-content-center">
      <div class="col-md-6 mt-5 bg-dark p-4 rounded">
        <h4 class="text-light">Tên đăng nhập: <?= $s_username; ?></h4>
        <h4 class="text-light">Mật khẩu: <?= $s_userpwd; ?></h4>
        <h4 class="text-light">Họ tên: <?= $s_fullname; ?></h4> 
        <h4 class="text-light">Email : <?= $s_email; ?></h4>
        <h4 class="text-light">SDT: <?= $s_phone; ?></h4>
        <?php echo 
        '<td><button class="btn" onclick=\'window.open("message.php?id='.$sv['id'].'","_self")\'>Gửi email</button></td>' ?>
      </div>      
    </div>
</body>
</html>
