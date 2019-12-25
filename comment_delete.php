<?php 
	require_once("connMysql.php");
	$id=$_GET['id'];
	$sql = "select sight_ID from comment where comment_ID = '$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);

	$sql = "delete FROM comment where comment_ID ='$id'";
	$result = mysql_query($sql);
	header("location:./information_detail.php?id=".$row["sight_ID"]);
?>