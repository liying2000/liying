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
		<form action="<?php echo Url::to(['show/add_do'])?>" method="post">
			<table>
				<tr>
					<td>用户名</td>
					<td><input type="text" name="user"></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="text" name="pwd"></td>
				</tr>
				<tr>
					<td><input type="submit" name="" value="提交"></td>
					<td></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>