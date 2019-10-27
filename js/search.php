
<html>
<head>
	<title>检索图书</title>
		<link rel="stylesheet" type="text/css" href="../css/search.css">

	<meta charset="utf-8">
</head>
<body>
	<div class="sear">
	<h1>图书检索</h1>
	</div>
	<div class="center">
	<form method="post">
		
			
			<input type="text" class="num" name="num" placeholder="ID"/>
		     <input type="text" class="title" name="book_title" placeholder="书名">
					<input type="text" class="author" name="author" placeholder="作者" > 
					<input type="submit" class="sub" name="submit"  value="搜索">

	</form>
	</div>
		<?php
		include("config.php");
		if (isset($_POST['submit'])){
		$num=$_POST["num"];
		$title=$_POST["book_title"];
		$author=$_POST["author"];
		$sql="SELECT * FROM book_message WHERE num='".$num."' or book_title='".$title."' or author='".$author."' ";
        $query = mysql_query($sql,$link);
	echo'<table align = "center" border = "1" width = "960" style="text-align: center;">';
	echo "<caption><h1>图书借阅</h1></caption>";
	echo "<tr>";
	echo "<td>"."书名"."</td>";
	echo "<td>"."作者"."</td>";
	echo "<td>"."入库时间"."</td>";
	echo "<td>"."类型"."</td>";
	echo "<td>"."单价"."</td>";
	echo "<td>"."剩余数量"."</td>";
	echo "<td>"."操作"."</td>";
	echo "</tr>";
	
	while($outcome = mysql_fetch_array($query))
	{
		echo "<tr>";
		$id = $outcome['num'];
		echo "<td>".$outcome['book_title']."</td>";
		echo "<td>".$outcome['author']."</td>";
		echo "<td>".$outcome['add_time']."</td>";
		echo "<td>".$outcome['type']."</td>";
		echo "<td>".$outcome['money']."元</td>";
		echo "<td>".$outcome['sy']."</td>";
		$zj="SELECT * FROM borrow WHERE book_id='".$id."'";
		$zjsz=mysql_query($zj,$link);
		$var=0;
		while($arr = mysql_fetch_array($zjsz))
		{    $account=$arr["user"];
			 $ren1="SELECT account FROM user WHERE account='".$account."'";
		     $ren2=mysql_query($ren1,$link);
		    while($ren3 = mysql_fetch_array($ren2))
		   { 
			if($arr["book_id"]==$id)
			if(!empty($ren3))
			{
				echo "<td class='color'>"."<a class=\"return\" href="."\""."return.php?id=".$id."&& book_title=".$outcome['book_title']."\"".">&nbsp;还书&nbsp;</a></td>";
				$var++;
				break;
			}
		}
		}
		if(($var==0)&&($outcome['sy']==0))
			echo "<td>本图书已借完</td>";
		else
			if($var==0)
			echo "<td>"."<a class=\"borrow\" href="."\""."borrow.php?id=".$id."&& book_title=".$outcome['book_title']."\"".">&nbsp;借书&nbsp;</a></td>";
	
		echo "</tr>";
	}
	echo "</table>";
	mysql_close($link);
	}
?>
</body>
</html>