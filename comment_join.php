<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  //新增
	$user_ID = $_POST['userID'];
	$sight_ID = $_POST['sightID'];
	$contxt = $_POST['context'];

if(isset($_POST['context'] )&& $_POST['context']!=' '){
		$data=mysql_query("insert into comment(user_ID, sight_ID, context) values('$user_ID', '$sight_ID', '$contxt')" );
		}

  //新增完成後重導回景點資訊頁面
 header("location:./information_detail.php?id=".$sight_ID);
?>
