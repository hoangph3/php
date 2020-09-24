<?php

//insert, update, delete
function execute($sql) {
	$conn = mysqli_connect('localhost','id14948603_root','Hoangmit28062017@','id14948603_dbsinhvien');

	mysqli_query($conn, $sql);

	mysqli_close($conn);
}

//tra ve ket qua cua ham select 
function execute_result($sql) {
	$conn = mysqli_connect('localhost','id14948603_root','Hoangmit28062017@','id14948603_dbsinhvien');

	$query = mysqli_query($conn, $sql);
	$result     = [];
	while ($row = mysqli_fetch_array($query, 1)) {
		$result[] = $row;
	}
	mysqli_close($conn);

	return $result;
}