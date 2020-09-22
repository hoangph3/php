<?php

/**
 * insert, update, delete -> su dung function
 */
function execute($sql) {
    
    //create connection toi database
	$conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');

	//query
	mysqli_query($conn, $sql);

	//dong connection
	mysqli_close($conn);
}

/**
 * su dung cho lenh select => tra ve ket qua
 */
function execute_result($sql) {
	//create connection toi database
	$conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');

	//query
	$resultset = mysqli_query($conn, $sql);
	$list      = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}
	//dong connection
	mysqli_close($conn);

	return $list;
}