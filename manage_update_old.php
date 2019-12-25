<?php
	require_once("connMysql.php");
	$id=$_GET["update_id"];
	$sql = "SELECT * FROM information where sight_ID ='$id'";
	$result_sight = mysql_query($sql);
?>

<html>
<head>
<title>修改景點</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table class="outtable">
  <tr><td class="header"><p align="center">[修改景點]<BR></p></td></tr>
  <tr>
	<form action= "manage_do_update.php" method="post">
	  <?php
	  $row_sight=mysql_fetch_assoc($result_sight);
	  echo $row_sight["sight_ID"];
	  echo "<BR>";
	  echo $row_sight["sight_name"];
	  echo "<BR>";
	  session_start();
	  $_SESSION['one']=$sight_ID;
	  ?>
	  票價:<input type="text" name="ticket_price"><br>
	  適合旅遊季節:<input type="text" name="season"><br>
	  地址:<input type="text" name="location"><br>
	  交通:<input type="text" name="traffic"><br>
	  官網:<input type="text" name="website"><br>
	  <input type="hidden" name="sight_ID" value = "<?php echo $id;?>"><br>
	  <input type="submit" value="修改景點">
	</form>
  </tr>
</table>
</body>
</html>