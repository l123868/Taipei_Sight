<?php
	require_once("connMysql.php");
	$id=$_GET["delete_id"];
	$sql = "DELETE FROM information where sight_ID='$id'";
        mysql_query($sql);
	//echo '您已刪除該景點';
        //echo $sql;
        header("Location: manage_show.php");

?>