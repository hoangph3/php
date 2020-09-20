<?php

$s_username = $_POST["username"];
$s_userpwd = $_POST["userpwd"];

$conn = mysqli_connect("127.0.0.1", "root", "", "dbsinhvien");
if(!$conn) {
    echo("Error description: " . mysqli_error($conn));
}

//select giao vien
$sql = "select * from teacher";
$query = mysqli_query($conn, $sql);
$list_teacher = [];
while ($row = mysqli_fetch_array($query, 1)) {
	$list_teacher[] = $row;
}
mysqli_close($conn);


//select sinh vien
$conn = mysqli_connect("127.0.0.1", "root", "", "dbsinhvien");
$s_sql = "select * from student";
$s_query = mysqli_query($conn, $s_sql);
$list_student = [];
while ($row = mysqli_fetch_array($s_query, 1)) {
    $list_student[] = $row;
}
mysqli_close($conn);


foreach ($list_teacher as $usr) {
if($usr["username"]==$s_username && $usr["userpwd"]==$s_userpwd) {
    header('Location: index.php');
}
else {
    foreach ($list_student as $sv) {
        if($sv["username"]==$s_username && $sv["userpwd"]==$s_userpwd) {
            header('Location: input.php');
        }
        else 
            header('Location: login.php');
        }
    }
}
    

