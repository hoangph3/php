<?php require_once 'utils.php';
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['username'])) {
  header("location: index.php");
}
else {
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = 'delete from message where id = '.$id;
	execute($sql);
	}
}