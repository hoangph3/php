<?php require_once 'utils.php';
session_start();
if (empty($_SESSION['id']) && empty($_SESSION['username'])) {
  header("location: index.php");
}
else {
    if (isset($_GET['challenge'])){
        $filename = $_GET['challenge'];
        $file = fopen($filename,"r");
        while(! feof($file))  {
          echo fgets($file)."<br/>";
        }
        fclose($file);
    }
}    
?>
