<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	</html>
<?php
	
	include("config.php");

	$mysql="delete from book_message where num = '". $_GET['id'] ."'AND book_title ='". $_GET['book_title'] . "'";

	mysql_query($mysql,$link);



	mysql_select_db("book", $link);

	$mysql="DELETE FROM borrow WHERE book_id = ".$_GET['id'];

	mysql_query($mysql,$link);



	mysql_close($link);

echo '<script type="text/javascript"> alert("删除成功"); window.location='.'\''.'manage.php'.'\''.'</script>';

?>