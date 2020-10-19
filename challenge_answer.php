<!DOCTYPE html>
<title>Answer a Challenge</title>
<?php require_once 'utils.php';
session_start();
if (isset($_GET['challenge'])){
    $filename = $_GET['challenge'];
    $file = fopen($filename,"r");
    while(! feof($file))  {
      echo fgets($file)."<br/>";
    }
    fclose($file);
}

