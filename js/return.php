<?php
	header("Content-Type:text/html;charset=utf-8");
	
	include("config.php");

	$sel="select * from book_message WHERE num=".$_GET['id'];

	$outcome= mysql_query($sel,$link);
	while($sql = mysql_fetch_array($outcome))
	{
		if ($sql['num'] == $_GET['id']) 
		{
				$sql['sy'] = $sql['sy']+1;
				$number = $sql['number']-1;

				$between_1="UPDATE book_message SET sy = '". $sql['sy'] ."' WHERE num = '". $_GET['id'] ."'AND book_title ='". $_GET['book_title'] . "'";
				mysql_query($between_1,$link);
				echo mysql_error();

				$between_2="UPDATE book_message SET number = '". $number ."' WHERE num = '". $_GET['id'] ."'AND book_title ='". $_GET['book_title'] . "'";
				mysql_query($between_2,$link);
				echo mysql_error();
				
				session_start();

				$mysql="DELETE FROM borrow WHERE book_id = '".$_GET['id']."'AND user = '".$_SESSION['account']."'";

				mysql_query($mysql,$link);
			}
	}
	mysql_close($link);
	echo '<script type="text/javascript"> alert("图书归还成功"); window.location='.'\''.'index.php'.'\''.'</script>';
	exit();
?>
