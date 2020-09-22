<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Bài tập</title>
	<h3 style="color:Tomato;font-size:35px">Danh sách bài tập</h3><br/>
</head>
<?php
$dir = "./uploads";

$all_files = scandir($dir);
$files = array_diff($all_files, array('.', '..')); 

foreach($files as $file){
    echo "<a href='download.php?file=".$file."'>".$file."</a><br>";
}