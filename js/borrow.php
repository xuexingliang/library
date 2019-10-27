<?php
	header("Content-Type:text/html;charset=utf-8");

	date_default_timezone_set("Asia/shanghai");
	$time = date("Y-m-d") . " " . date("h:i:sa");

	include("config.php");

	$sel="select * from book_message WHERE num=".$_GET['id'];

	$outcome= mysql_query($sel,$link);
	while($sql = mysql_fetch_array($outcome))
	{
		if ($sql['num'] == $_GET['id']) 
		{
			if ($sql['sy'] >= 1) 
			{
				$sql['sy'] = $sql['sy']-1;
				$sql['number'] = $sql['number']+1;

				$between_1="UPDATE book_message SET sy = '". $sql['sy'] ."' WHERE num = '". $_GET['id'] ."'AND book_title ='". $_GET['book_title'] . "'";
				mysql_query($between_1,$link);
				echo mysql_error();

				$between_2="UPDATE book_message SET number = '". $number ."' WHERE num = '". $_GET['id'] ."'AND book_title ='". $_GET['book_title'] . "'";
				mysql_query($between_2,$link);
				echo mysql_error();
				
				session_start();
				$ins="INSERT INTO borrow (user,book_id,time)
				VALUES ('$_SESSION[account]','$_GET[id]','$time')";
				mysql_query($ins,$link);
			}
			else
			{ 
				echo '<script type="text/javascript"> alert("该图书已借完"); window.location='.'\''.'index.php'.'\''.' </script>';
				exit();
			}
		}
	}
	mysql_close($link);
	echo '<script type="text/javascript"> alert("图书借阅成功"); window.location='.'\''.'index.php'.'\''.'</script>';
		exit();
?>
