<?php
	require_once("connMysql.php");
	session_start();
	require_once("login_check.php");
	$sql = "SELECT * FROM user WHERE account='".$_SESSION["account"]."'";
	$record = mysql_query($sql);
	$login = mysql_fetch_assoc($record);
	if($login["account"]!="manager8")
	{ 
		header("location:./index.php"); 
	}

	//INSERT指令
	$sql = "INSERT INTO information(sight_name, ticket_price, website, season, type_name, location, traffic) VALUES ";
	$sql .= "('".$_POST["sight_name"]."','".$_POST["ticket_price"]."','".$_POST["website"]."', '".$_POST["season"]."', '".$_POST["type_name"]."', '".$_POST["location"]."', '".$_POST["traffic"]."')";
        mysql_query($sql);
		echo $sql;

        //新增完成後重導回manage_show.php
        header("Location: manage_show.php");
       
        
?>
