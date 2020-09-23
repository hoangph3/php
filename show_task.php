<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Bài tập</title>
	<h1 style="color:black;font-size:30px">Danh sách bài tập</h1>
</head>
<body>
	<table class="styled-table">
		<thead>
			<tr>
				<th width=1150>Bài tập</th>
				<th></th>
			</tr>
		</thead>
		<tbody>

<?php require_once 'utils.php';

//lay id trong url
if (isset($_GET['id'])) {
	$id          = $_GET['id']; //id cua sinh vien
	
	$sql = 'select * from student where id = '.$id;
	$list_student = execute_result($sql);
	
	if ($list_student!= null && count($list_student) > 0) {
		$sv = $list_student[0];
	}
}

//hien thi danh sach bai tap
$dir = "./uploads";

$all_files = scandir($dir);
$files = array_diff($all_files, array('.', '..')); 

foreach($files as $file){
	echo "<tr><td><a href='download.php?file=".$file."'>".$file."</a></td>"
	 .'<td><button class="button button2" onclick=\'window.open("up_answer.php?id='.$sv['id'].'","_self")\'>Nộp bài</button></td>';
		
}
