<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Đăng nhập</title>
	<h1>Đăng nhập</h1>
</head>
<body>
	<form method="post" action="validate.php">
		<div class="input-group">
			<label for="username">Tên đăng nhập</label>
			<input required="true" type="text" class="form-control" id="username" name="username">
		</div>
		<div class="input-group">
			<label for="userpwd">Mật khẩu</label>
			<input required="true" type="password" class="form-control" id="userpwd" name="userpwd"></input>
		</div>
		<div class="input-group">
                <input type="submit" class="button buton1" value="Đăng nhập"/>
		</div>
	</form>
</body>
</html>
