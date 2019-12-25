<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  //執行更新動作
  
		$id = $_POST['id'];
		$contxt = $_POST['context'];
		$sightID = $_POST['sightID'];
	
		$sql = "update comment set context ='$contxt' where comment_ID = '$id'";
		$data=mysql_query($sql);
 
  //修改完成後重導回景點資訊頁面
 header("location:./information_detail.php?id=".$sightID);
?>
