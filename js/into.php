	
<?php
header("Content-Type:text/html;charset=utf-8");
include("config.php");
$book_title=$_POST['book_title'];
$author=$_POST['author'];
$add_time=$_POST['add_time'];
$type=$_POST['type'];
$money=$_POST['money'];
$sy=$_POST['sy'];
$sql="INSERT INTO book_message (book_title,author,add_time,type,money,sy)
VALUES
('$book_title','$author','$add_time','$type','$money','$sy')";
   
   
if (!mysql_query($sql,$link))
  {
  die('Error: ' . mysql_error());
  }
echo '<script type="text/javascript"> alert("图书添加成功"); window.location='.'\''.'manage.php'.'\''.'</script>';
   
mysql_close($link)
?>