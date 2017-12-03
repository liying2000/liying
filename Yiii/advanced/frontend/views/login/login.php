<?php
	use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo Url::to(['login/login_do'])?>" method="post">
			<table>
				<tr>
					<td>用户名</td>
					<td><input type="text" name="login_name"></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="text" name="login_pwd"></td>
				</tr>
				<tr>
					<td><input type="submit" name="" value="登录"></td>
					<td></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>