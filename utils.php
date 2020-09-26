<?php
function execute($sql) {
	$conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');
	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function execute_result($sql) {
	$conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');
	$query = mysqli_query($conn, $sql);
	$result     = [];
	while ($row = mysqli_fetch_array($query, 1)) {
		$result[] = $row;
	}
	mysqli_close($conn);
	return $result;
}

function connect_db() {
    $conn = mysqli_connect('127.0.0.1','root','','dbsinhvien') or die ('Exit!');
	return $conn;
}

function close_db() {
    $conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');
	mysqli_close($conn);
}
