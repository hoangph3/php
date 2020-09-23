<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang nạp bài tập</title>
    <link rel="stylesheet" href="">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value="Upload">
</form>
<?php require_once 'utils.php';

$id = '';
if (isset($_POST['up']) && isset($_FILES['fileUpload']) && isset($_GET['id'])) {
    $id          = $_GET['id'];
	$sql         = 'select * from student where id = '.$id; // . = noi chuoi
	
	$list_student = execute_result($sql);
	
	if ($list_student != null && count($list_student) > 0) {
		$sv        = $list_student[0];
        $s_username = $sv['username'];
    }
        
    if ($_FILES['fileUpload']['error'] > 0) {
        echo "Upload không thành công <br/>";
        echo '<a style="font-size:30;" href="./up_answer.php?id='.$id.'">Đăng lại</a><br/>';
    }
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'admin/answer/' . $_FILES['fileUpload']['name']);
        $s_filename = $_FILES['fileUpload']['name'];
        echo "Upload thành công <br/>";
        $sql = "insert into homework(username, filename, time) value ('$s_username', '$s_filename', NOW())";
        execute($sql);
    }
}
?>
</body>
</html>