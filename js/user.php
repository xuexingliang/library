<!DOCTYPE html>
<html>
<head>
	<title>用户信息查看</title>
	<link rel="stylesheet" type="text/css" href="../css/search.css">
	<meta charset="UTF-8" />
<style type="text/css">
.kq
{ 
	margin: 0px 0px 0px 190px;
}
</style>
</head>
<body>
<?php

	include("config.php");

	session_start();

	$between="SELECT * FROM board WHERE user='".$_SESSION['account']."'";

	$outcome = mysql_query($between,$link);

	echo "<table border='1' align = \"center\"  width = \"960\" style=\"text-align: center;margin-top:50px;\"><caption><h1>我的留言板</h1></caption><tr><th>时间</th><th>留言内容</th></tr>";

	$var = 0;

	while($sql = mysql_fetch_array($outcome))
	{
		echo "<tr><td>".$sql['time']."</td><td align='left'>&nbsp;&nbsp;&nbsp;".$sql['message']."</td></tr>";
		if(isset($sql['time']))
			$var++;
	}
	if($var == 0)
		echo "<tr><td colspan='2' align='center'>没有留言信息</td></tr>";
	echo "</table>";



	$between="SELECT * FROM borrow WHERE user='".$_SESSION['account']."'";

	$outcome = mysql_query($between,$link);

	echo'<table align = "center" border = "1" width = "960" style="text-align: center;">';
	echo "<caption><h1>我借的书</h1></caption>";

	echo "<tr>";
	echo "<td>借书时间</td>";
	echo "<td>书名</td>";
	echo "<td>作者</td>";
	echo "<td>类型</td>";
	echo "<td>单价</td>";
	echo "</tr>";

	$var = 0;

	while($sql_w = mysql_fetch_array($outcome))
	{


		$between="SELECT * FROM book_message WHERE num='".$sql_w["book_id"]."' ";
		$outcome_t = mysql_query($between,$link);

		while($sql = mysql_fetch_array($outcome_t))
		{
			echo "<tr>";
			echo "<td>".$sql_w['time']."</td>";
			echo "<td>".$sql['book_title']."</td>";
			echo "<td>".$sql['author']."</td>";
			echo "<td>".$sql['type']."</td>";
			echo "<td>".$sql['money']."元</td>";
			
			if(isset($sql['type'])&&isset($sql_w['time']))
			$var++;
		}
		
	}

	if($var == 0)
		echo "<tr><td colspan='5'>暂无借阅图书</td></tr>";

	echo "</table>";
	mysql_close($link);
?>
     <div class="foot" style="margin-top: 50px;"><a href="index.php" style="text-decoration: none;">返回主页</a></div>
</body>
</html>