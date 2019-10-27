<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>用户登录</title>
		<link rel="stylesheet" href="../css/index.css" />
	</head>
	<body>
		<div class="content">
			<div class="header">
		<h1><img src="../img/logo.png">欢迎登陆图书管理系统</h1>
		</div>
		<div class="center">
			<div class="fork"></div>
		<form method="post">
		<input type="text" class="user" name="account" placeholder="账户" required=""/><br>
	    <input type="password" class="pwd" name="password" placeholder="登录密码" required=""><br>
			<input type="submit" name="submit" class="sub" value="登录"/>
			<div class="reg" ><a href="registe.php">注册</a></div>
			<div class="reg" ><a href="adminregiste.php">管理员注册</a></div>
			</form>
			</div>
		</div>
			<div class="footer">
				<p>PHP课程设计|图书管理系统</p>
			</div>
			</div>
	</body>
</html>
<?php
	$a=0;
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{	
		include("config.php");

		$outcome= mysql_query("select * from user",$link);

		while($sql = mysql_fetch_array($outcome))
		{ 
			if (strcmp($sql['account'],$_POST['account']))
				$a=$a+1;
			if (strcmp($sql['password'],$_POST['password']))
				$a=$a+1;
			if ($a==0)
				{
					mysql_close($link);

					session_start();
					$_SESSION['nickname'] = $sql['nickname'];
					$_SESSION['class'] = $sql['class'];
					$_SESSION['account'] = $sql['account'];
					echo '<script type="text/javascript"> alert("登陆成功"); window.location='.'\''.'index.php'.'\''.' </script>';
				};
			$a=0;
		}
		echo '<script type="text/javascript"> alert("用户名不存在或密码错误"); window.location='.'\''.'login.php'.'\''.' </script>';
	}
?>