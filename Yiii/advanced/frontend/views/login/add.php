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
		<form action="<?php echo Url::to(['login/add_do'])?>" method="post">
			<table>
				<tr>
					<td>留言标题:</td>
					<td><input type="text" name="leave_name"></td>
				</tr>
				
				<tr>
					<td>留言内容:</td>
					<td><textarea name="leave_content" id="" cols="30" rows="10"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" name="" value="留言"></td>
					<td></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>