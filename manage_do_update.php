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

	//UPDATE指令
	/*echo $_POST["sight_name"]."<BR>";
	echo $_POST["ticket_price"]."<BR>";
	echo $_POST["website"]."<BR>";
	echo $_POST["season"]."<BR>";
	echo $_POST["type_name"]."<BR>";
	echo $_POST["location"]."<BR>";
	echo $_POST["traffic"]."<BR>";
	echo $_POST["sight_ID"]."<BR>";*/

	
	$sql = "UPDATE information SET ";
	$sql .= "sight_name ='".$_POST["sight_name"]."',";
	$sql .= "ticket_price ='".$_POST["ticket_price"]."',";
	$sql .= "website='".$_POST["website"]."',";
    $sql .= "season='".$_POST["season"]."',";
	$sql .= "type_name='".$_POST["type_name"]."',";
	$sql .= "location='".$_POST["location"]."',";
    $sql .= "traffic='".$_POST["traffic"]."' ";

	$sql .= "where sight_ID='".$_POST["sight_ID"]."'";
        mysql_query($sql);

        echo $sql;
        //修改完成後重導回manage_show.php
        header("Location: manage_show.php");

?>
