<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang nạp bài tập</title>
    <h1>Nạp bài tập của bạn</h1>
</head>
<body>




<form action="up_answer.php" method="post" enctype="multipart/form-data">
    <div class="input-group">
        <label for="username">Tên đăng nhập</label>
        <input required="true" type="text" name="username">
    </div>
    <div class="input-group">
        <label for="userpwd">Mật khẩu</label>
        <input required="true" type="password" name="userpwd" value="">
    </div>
    <div class="input-group">
        <input required="true" type="file" name="fileUpload" value="">
    </div>
    <div class="input-group">
        <input type="submit" name="up" value="Upload">
    </div>
</form>
</body>
</html>


