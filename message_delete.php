<?php require_once 'utils.php';
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = 'delete from message where id = '.$id;
	execute($sql);
}