<?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if (!file_exists($_FILES['fileUpload']['name'])){
        echo "<div><h2 style='margin-left:2;color:red;'> File đã tồn tại, hãy đổi tên file !</h2></div>";
    }
    else if ($_FILES['fileUpload']['error'] > 0)
        echo "<div><h2 style='margin-left:2;color:red;'> Đã có lỗi, vui lòng thử lại !</h2></div>";
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/' . $_FILES['fileUpload']['name']);
        echo '<div><h3 style="color:#009879;font-size:30px">Uploaded successfully !</h3></div>';
        //echo '<div><h3 style="color:#009879;font-size:30px">Directory: uploads/' . $_FILES['fileUpload']['name'] . '</h3></div>';
        echo '<div><h3 style="color:#009879;font-size:30px">Type: ' . $_FILES['fileUpload']['type'] . '</h3></div>';
    }
}
?>
<link rel="stylesheet" type="text/css" href="index.css">
<a style="font-size:30;" href="./show_task.php">Xem bài tập ngay!</a><br/><br/>
<a style="font-size:30;" href="./up_task.php">Đăng lại</a>
