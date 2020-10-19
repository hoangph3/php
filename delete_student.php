<?php require_once 'utils.php';
session_start();
if(isset($_SESSION['level']))  {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = 'delete from user where id = '.$id;
		execute($sql);
	}
}
else {
	header("location: log_out.php");
}