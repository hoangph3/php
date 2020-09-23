<?php require_once 'utils.php';

if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = 'select * from student where id = ' .$id;
        $list_student = execute_result($sql);
        $student = $list_student[0];
        $s_username = $student['username'];
        
        if ($_FILES['fileUpload']['error'] > 0) {
            echo "<div><h2 style='color:red;'> Đã có lỗi, vui lòng thử lại !</h2></div>";
        }
        else {
            move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'admin/answer/' . $_FILES['fileUpload']['name']);
            
            $s_filename = $_FILES['fileUpload']['name'];

            $sql = "insert into homework(username, filename, time)
                value ('$s_username', '$s_filename', NOW())";
            execute($sql);
        }
    }
} ?>
<link rel="stylesheet" type="text/css" href="index.css">

