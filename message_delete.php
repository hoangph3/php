<?php $conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	$sql = 'delete from message where id = '.$id;
	mysqli_query($conn, $sql);
}