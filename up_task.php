<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang đăng bài tập</title>
    <link rel="stylesheet" href="">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value="Upload">
</form>
<?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0) {
        echo "Upload không thành công <br/>";
        echo '<a style="font-size:30;" href="./up_task.php">Đăng lại</a><br/>';
        echo '<a style="font-size:30;" href="./show_task.php">Xem bài tập ngay!</a>';
    }
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/' . $_FILES['fileUpload']['name']);
        echo "Upload thành công <br/>";
        echo '<a style="font-size:30;" href="./show_task.php">Xem bài tập ngay!</a>';
    }
}
?>
</body>
</html>