<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	</html>
<?php
	date_default_timezone_set("Asia/Shanghai");
	$time = date("Y-m-d") . " " . date("h:i:sa");
?>
<html>
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/revise.css">
<style type="text/css">
.add_top
{ 
	margin-top: 100px;
}
</style>
</head>
<body>
	<div class="content">
		<h1>添加图书</h1>
	<table align="center" class="add_top">
	<form method="POST" action="into.php">
		<tr>
			<td><input class="title" type="text" name="book_title" required="required" placeholder="书名"/></td>
		</tr>
		<tr>
			
			<td><input class="author" type="text" name="author" required="required" placeholder="作者"/></td>
		</tr>
		<tr>
			<td><input class="id" type="text" name="add_time" required="required" style="color:#D65B88;" placeholder="入库时间" value="<?php echo $time;  ?>" /></td>
		</tr>
		<tr>
			<td>
			<select class=type name="type" style="color:#D65B88;">
			<option value="计算机技术">计算机技术</option>
			<option value="社会科学">社会科学</option>
			<option value="建筑工程">建筑工程</option>
			<option value="军事科学">军事科学</option>
			<option value="文学著作">文学著作</option>
			<option value="政治法律">政治法律</option>
			<option value="农业科学">农业科学</option>
			<option value="医药卫生">医药卫生</option>
			<option value="历史地理">历史地理</option>
			<option value="其它">其它</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td><input class="jia" type="text" required="required" name="money" placeholder="单价"/></td>
		</tr>
		<tr>
			
			<td><input class="sy" type="text" required="required" name="sy" placeholder="书本数量"/></td>
		</tr>
		<tr class="lef">
		<td><input class="sub"  type="submit" value="添加" />
		<input class="reset"  type="reset" value="重置" /></td>
		</tr>
	</form>
	</table>
	</div>
	   <div>
		<a href="manage.php" >返回主管理界面</a>
		</div>
</body>
</html>