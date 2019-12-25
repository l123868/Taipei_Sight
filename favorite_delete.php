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
$userID = $row["user_ID"];
$sightID = $_GET['id'];
	
$sql = "delete from favorite where user_ID = '$userID' and sight_ID = '$sightID';";
mysql_query($sql);
//header("location:./information_detail.php?id=".$_GET['id']);
//header("location:".$_SERVER["HTTP_REFERER"]); //回上一頁
?>