<!DOCTYPE html>
<html>
<head>
	<title>留言板</title>
	<link rel="stylesheet" type="text/css" href="../css/revise.css">
	<meta charset="UTF-8"/>
</head>
<body>
	<h1>留言板</h1>
<form method="POST" action="mes_into.php">
	<table align="center" style="margin-top:150px;">
		
		<tr><td><textarea name="message" rows="20" cols="150" required="required" style="background: transparent;border-color: #0000FF;" ></textarea></td></tr>
		<tr><td><input class="sub" type="submit" value="提交" style="margin-top:50px ;"/></td></tr>
		<tr><td><a href="index.php">返回主页</a></td></tr>
	</table>
</form>
</body>
</html>