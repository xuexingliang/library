<?php
	error_reporting(1);
	$link = mysql_connect("localhost","root","123456");

	mysql_select_db("book",$link);

	mysql_query("set names utf8");

?>