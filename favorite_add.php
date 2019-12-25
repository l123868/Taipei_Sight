<?php  
session_start();
//檢查是否已登入
require_once("login_check.php");
//查詢登入會員資料
require_once("connMysql.php");
$sql = "SELECT *, YEAR(birthday) as year, MONTH(birthday) as month, DAYOFMONTH(birthday) as day FROM user WHERE account='".$_SESSION["account"]."'";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);
//4,5拿到會員資料
	
$sql = "insert into favorite(user_ID, sight_ID) ";
$sql .= "values('".$row["user_ID"]."','".$_GET['id']."');";
mysql_query($sql);

//header("location:./information_detail.php?id=".$_GET['id']);
//insert into favorite values(user_ID='     ',sight_ID='    ');

?>