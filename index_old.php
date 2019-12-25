 <?php 
	//獲得會員資料
	require_once("connMysql.php");
	session_start();
	if(isset($_SESSION["account"]))
	{
		$sql = "SELECT * FROM user WHERE account='".$_SESSION["account"]."'";
		$record = mysql_query($sql);
		$login = mysql_fetch_assoc($record);
	}
?>	




<html>
<head>
<title>景點查詢</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <p align="left"><font  color="#8000ff" size=7 face="標楷體"><BR>臺北景點查詢系統<BR><BR></font></p>
	
	<p align="right">
	<?php   
	if(!isset($_SESSION["account"]) || ($_SESSION["account"]==""))//未登入
	{
		echo '<a href="login_form.php">登入</a>';
		
	}
	else//已登入
	{
		echo "Hello, ";
		echo '<a href="member_center.php">'.$login["name"].'</a>';
		echo '<a href="logout.php">&nbsp; &nbsp; &nbsp;登出&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a><br>';
		
	}
	?>
  </p>

  
   

		<form name="form1" method="post" action="information_show.php">
	<p align="left"><td colspan="2" class="header"><font size=6 face="標楷體">旅遊類型查詢&nbsp;&nbsp;</font>
	  <select name="type">
	    <option>宗教</option>
		<option>古蹟</option>
		<!--<option>單車</option>-->
		<option>生態旅遊</option>
		<option>展覽</option>
		<option>圖書館</option>
		<option>博物館</option>
		<option>市集</option>
		<option>港口</option>
	  </select>
		<input type="submit" value="查詢">
	</p>
	    </form>

 
  <form action= "information_partial.php" method="post" >
  <p align="left"><td colspan="2" class="header"><font size=6 face="標楷體">景點名稱查詢&nbsp;&nbsp;</font>
	  <input type="text" name="SightName">
	  <input type="submit" value="查詢">
	</p>
	</form>


</body>
</html>