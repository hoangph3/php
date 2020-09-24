<?php
$conn = mysqli_connect('localhost','id14948603_root','Hoangmit28062017@','id14948603_dbsinhvien');

if (isset($_POST['id'])) {
	$id = $_POST['id'];

	$sql = 'delete from message where id = '.$id;
	mysqli_query($conn, $sql);
}