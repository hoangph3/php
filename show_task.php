<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Bài tập</title>
	<h4 style="color:Tomato;font-size:30px">Danh sách bài tập</h4><br/>
</head>
<body>
	<table class="styled-table">
		<thead>
			<tr>
				<th>Bài tập</th>
				<th width="500"></th>
				<th></th>
			</tr>
		</thead>
		<tbody>

<?php
//lay id trong url
if (isset($_GET['id'])) {
	$id          = $_GET['id'];

	$sql = 'select * from student where id = '.$id;
	$conn = mysqli_connect('127.0.0.1','root','','dbsinhvien');
	$query = mysqli_query($conn, $sql);
	$list_student = [];
	while ($row = mysqli_fetch_array($query, 1)) {
		$list_student[] = $row;
	}
	if ($list_student!= null && count($list_student) > 0) {
		$sv = $list_student[0];
	}
}

//hien thi danh sach bai tap
$dir = "./uploads";

$all_files = scandir($dir);
$files = array_diff($all_files, array('.', '..')); 

foreach($files as $file){
	echo "<tr>
		<td><a href='download.php?file=".$file."'>".$file."</a></td>
		</tr>";
}