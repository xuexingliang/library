
<html>
<head>
	<title>图书后台管理</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/search.css">
<style type="text/css">
td
{ 
	 height:25px;
}
</style>
</head>
<body>
	<div class="content">
		<h1>图书管理</h1>
<table align = "center" border = "1" width = "960" style="text-align: center;margin-top: 100px;margin-bottom: 100px;">
	<tr>
		<td colspan="4">欢迎你，管理员</td>
	</tr>
	<tr>
		<td width = "320" ><a href="addbook.php" style="text-decoration: none;">图书添加</a></td>
		<td width = "320" ><a href="examine_mes.php" style="text-decoration: none;">查看用户留言</a></td>
		<td width = "320" ><a href="b_borrow.php" style="text-decoration: none;">查看图书借阅信息</a></td>
	</tr>
</table>
</div>
<?php
	include "page.cless.php";
	include("config.php");
	$outcome= mysql_query("select * from book_message",$link);//使用mysql_query函数取得select语句的结果集
	$total = mysql_num_rows($outcome);//返回结果集中行的数量
	$num = 10;
	$page = new Page($total,$num,"");
	$sql = "select * from book_message {$page->limit}";
	$outcome = mysql_query($sql);
	echo '<table align = "center" border = "1" width = "960"  style="text-align: center;">';
	echo "<tr>";
	echo "<td>"."ID"."</td>";
	echo "<td>"."书名"."</td>";
	echo "<td>"."作者"."</td>";
	echo "<td>"."入库时间"."</td>";
	echo "<td>"."类型"."</td>";
	echo "<td>"."单价"."</td>";
	echo "<td>"."剩余数量"."</td>";
	echo "<td>"."已借阅数量"."</td>";
	echo "<td>"."操作"."</td>";
	echo "</tr>";
	while($sql = mysql_fetch_array($outcome))//使用mysql_query函数取得select语句的结果集后，使用mysql_fetch_array函数遍历结果集中的数据。
	{
		echo "<tr>";
		$id = $sql['num'];
		echo "<td>".$sql['num']."</td>";
		echo "<td>".$sql['book_title']."</td>";
		echo "<td>".$sql['author']."</td>";
		echo "<td>".$sql['add_time']."</td>";
		echo "<td>".$sql['type']."</td>";
		echo "<td>".$sql['money']."元</td>";
		echo "<td>".$sql['sy']."</td>";
		echo "<td>".$sql['number']."</td>";
		echo "<td>"."<a href="."\""."delete_zj.php?id=".$id."& book_title=".$sql['book_title']."\""." >&nbsp;&nbsp;删除&nbsp;|&nbsp;</a>";
		echo "<a href="."\""."revise.php?id=".$id."& book_title=".$sql['book_title']."\"".">修改&nbsp;&nbsp;</a></td>";
		echo "</tr>";
	}
	echo "<tr><td colspan = \"9\" align = \"center\">".$page->fpage(array(3,4,5,8,6,7,2,0,))."</td></tr>";
	echo "<tr><td colspan = \"9\" align = \"center\"><a href=\"index.php\" >返回图书借阅界面</a></td></tr>";
	echo "</table>";
	mysql_close($link);
?>
</body>
</html>
