<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Challenge</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php require_once 'utils.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo '<h1>Challenge của bạn</h1>'; 
    }
else {
    echo '<form action="challenge.php" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <input type="file" name="fileUpload" value="">
            </div>
            <div class="input-group">    
                <label for="suggest">Gợi ý</label>
                <input type="text" name="suggest" id="suggest">
            </div>
            <div class="input-group">    
                <input type="submit" name="up" value="Submit">
            </div>
        </form>';
    }
?>
<?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0) {
        echo "Upload không thành công <br/>";
        echo '<a style="font-size:30;" href="./challenge_add.php">Đăng lại</a><br/>';
    }
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], './admin/challenge/' . $_FILES['fileUpload']['name']);
        $suggest = $_POST['suggest'];
    }
}
$sql = "insert into challenge(suggest) value('$suggest')";
if ($suggest != '') {
    execute($sql);
}
?>
<table class="styled-table">
		<thead>
			<tr>
				<th>Gợi ý dành cho bạn</th>
				<th width="50"></th>
			</tr>
		</thead>
		<tbody>
<?php 
$sql = "select * from challenge";
$list_suggest = execute_result($sql);
foreach ($list_suggest as $idea) {
echo '<tr>
            <td>'.$idea['suggest'].'</td>
            <td><button class="button button2" onclick=\'window.open("challenge_solve.php?id='.$id.'","_self")\'>Solve</button></td>
        </tr>';
}
?> 
        </tbody>
</body>
</html>