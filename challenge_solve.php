<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Solve Challenge</title>
	<h1>Nhập đáp án của bạn</h1>
</head>
<body>
<form method="post" action="">
    <div class="input-group">
        <label for="username">Nhập đáp án</label>
        <input required="true" type="text" class="form-control" id="answer" name="answer">
    </div>
    <div class="input-group">
            <input type="submit" class="button buton1" name="submit" value="Trả lời"/>
    </div>
</form>
<?php require_once 'utils.php';
if (isset($_POST['submit'])){
    $answer = $_POST['answer'];
} 



?>
</body>
</html>
