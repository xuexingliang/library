<?php
	include("config.php");


	$outcome= mysql_query("SELECT * FROM book_message WHERE  book_title ='". $_GET['book_title'] . "'",$link);

	while($sql = mysql_fetch_array($outcome))
	{
		if(($sql['num']==$_GET['id'])&&($sql['book_title']==$_GET['book_title']));
			break;
	}
?>
<html>
<head>
	<title>信息修改</title>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/revise.css">
<style type="text/css">
.add_top
{ 
	margin-top: 100px;
}
</style>
</head>
<body>
	<div class=content>
		<h1>信息修改</h1>
	<table align="center" class="add_top">
	<form method="POST" action="into_again.php?bo_ti=<?php echo $sql['book_title']; ?>&&nm=<?php echo $sql['num']; ?>">
		<tr>
		
			<td><input class="id" type="text" name="num" placeholder="ID" value="<?php echo $sql['num'];  ?>" /></td>
		</tr>
		<tr>
			<td><input class="title" type="text" name="book_title" placeholder="书名"  value="<?php echo $sql['book_title'];  ?>"/></td>
		</tr>
		<tr>
			<td><input class="author" type="text" name="author" placeholder="作者" value="<?php echo $sql['author'];  ?>" /></td>
		</tr>
		<tr>
			<td><input class="time" type="text" name="add_time" placeholder="入库时间"  value="<?php echo $sql['add_time'];  ?>" /></td>
		</tr>
		<tr>
			<td>
			<select class="type" name="type"  style="opacity: 1;color: #D65B88;">
			<option value="程序语言" <?php if($sql['type']=="程序语言") echo 'selected="selected"'; ?> >程序语言</option>
			<option value="HTML系列"<?php if($sql['type']=="HTML系列") echo 'selected="selected"'; ?> >HTML系列</option>
			<option value="浏览器脚本"  <?php if($sql['type']=="浏览器脚本") echo 'selected="selected"'; ?> >浏览器脚本</option>
			<option value="服务器脚本"  <?php if($sql['type']=="服务器脚本") echo 'selected="selected"'; ?> >服务器脚本</option>
			<option value="ASP.NET"  <?php if($sql['type']=="ASP.NET") echo 'selected="selected"'; ?> >ASP.NET</option>
			<option value="XML(扩展标记语言)"  <?php if($sql['type']=="XML(扩展标记语言)") echo 'selected="selected"'; ?> >XML（扩展标记语言）</option>
			<option value="Web Services 系列"  <?php if($sql['type']=="Web Services 系列") echo 'selected="selected"'; ?> >Web Services 系列</option>
			<option value="网站构建"  <?php if($sql['type']=="网站构建") echo 'selected="selected"'; ?> >网站构建</option>
			<option value="计算机结构基础"  <?php if($sql['type']=="计算机结构基础") echo 'selected="selected"'; ?> >计算机结构基础</option>
			<option value="其它"  <?php if($sql['type']=="其它") echo 'selected="selected"'; ?> >其它</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td><input class="jia" type="text" name="money" placeholder="单价"  value="<?php echo $sql['money'];  ?>"/></td>
		</tr>
		<tr>
			<td><input class="sy" type="text" name="sy" placeholder="剩余图书数量"  value="<?php echo $sql['sy']; ?>"/></td>
		</tr>
		<tr>
			<td><input type="text" class="rent" name="number" placeholder="借阅图书数量"  value="<?php echo $sql['number'];  mysql_close($link); ?>"/></td>
		</tr>
		<tr>
			<td><input class="sub" type="submit" value="提交" /></td>
			<td><input class="reset" type="reset" value="重置" /></td>
		</tr>
	</form>
	</table>
	</div>
	<div><a href="manage.php" >返回主管理界面</a></div>
</body>
</html>