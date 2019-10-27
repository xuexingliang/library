<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../css/registe.css" />
	</head>
	<body>
<div class="content">
			<div class="header">
		<h1><img src="../img/img5.png">管理员注册</h1>
		</div>
<form method="post">  
<div class="center">
   <input class="user" type="text" name="account" placeholder="账户" required=""/>  

    <br/>  

    <input class="pwd" type="password" name="password" placeholder="密码" required=""/>  

    <br/>  

    <input class="repwd" type="password" name="repassword" placeholder="确认密码" required=""/>
    </br>  
     <input class="nickname" type="text" name="nickname" placeholder="昵称" required=""/>
     <br/>
     <input type="hidden" value="1" name="class">
<br />
    <input class="email" type="text" name="email" placeholder="电子邮件"/>
     <br/>
     <input class="phone" type="text" name="phone" placeholder="联系电话"/>  

    <br/>  

    <input class="sub" type="submit" name="submit" value="注册"/>  
</div>
</form>
</div>
	</body>
</html>
<?php 
$link = mysql_connect('localhost', 'root', '123456', 'book');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}else {
    if (isset($_POST['submit'])){
        if ($_POST['password'] == $_POST['repassword']){
    $query = "insert into user (account,password,nickname,class,email,phone) values('{$_POST['account']}','{$_POST['password']}','{$_POST['nickname']}','{$_POST['class']}','{$_POST['email']}','{$_POST['phone']}')";
    $result=mysql_query($link, $query);
    echo '<script type="text/javascript"> alert("管理员账户创建成功"); window.location='.'\''.'login.php'.'\''.'</script>';
        }else {
            echo "<script>alert('两次输入密码不一致！')</script>";
        }
    }
}
?>
