<?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0)
        echo "<div><h1>Error !</h1></div>";
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/' . $_FILES['fileUpload']['name']);
        echo '<div><h3 style="color:Tomato;font-size:30px">Uploaded successfully !</h3></div>';
        echo '<div><h3 style="color:Tomato;font-size:30px">Directory: uploads/' . $_FILES['fileUpload']['name'] . '</h3></div>';
        echo '<div><h3 style="color:Tomato;font-size:30px">Type: ' . $_FILES['fileUpload']['type'] . '</h3></div>';
    }
}
?>
<link rel="stylesheet" type="text/css" href="index.css">
<a href="./show_task.php">Xem bài tập ngay!</a>