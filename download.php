<?php require_once 'utils.php';
session_start();
if(isset($_SESSION['level']))  {

if(isset($_GET['file']))
{
    $filename = $_GET['file'];

$dir = "uploads/assignment/"; 
$file = $dir . $filename;

if (file_exists($file))
    {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
    }
}

else if(isset($_GET['answer']))
{
    $file = $_GET['answer'];

if (file_exists($file))
    {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
    }
  } 
}
else {
  header("location: log_out.php");
}

