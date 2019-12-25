<?php 
	//檢查是否已登入	
	require_once("connMysql.php");
	session_start();
	require_once("login_check.php");
	$sql = "SELECT * FROM user WHERE account='".$_SESSION["account"]."'";
	$record = mysql_query($sql);
	$login = mysql_fetch_assoc($record);
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="style.css" rel="stylesheet" type="text/css">
  <title>會員管理系統</title>
</head>
<body>

      <p><font size="4" color="#0000a0">會員中心</font></p>
     <p align="right"> 
	 <a href="./index.php">景點查詢&nbsp;&nbsp;&nbsp;</a>

		 <?php
		 if($login["account"]=="manager8"){
			 ?>
			 <a href="./manage_show.php">景點修改&nbsp;&nbsp;&nbsp;</a>
			 <?php
		 }
		 echo '<a href="logout.php">登出&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a><br></p>';
		 ?>
		 
	 </p>
	 <p ><hr align="right" size = 1 width = 100%></p>
    	<p align="left">&nbsp;&nbsp;&nbsp;Hello, <?php echo $login["name"]?>&nbsp;&nbsp;&nbsp;
		<a href="member_update_form.php">修改資料&nbsp;&nbsp;&nbsp;</a>
		<a href="member_change_password_form.php">修改密碼&nbsp;&nbsp;&nbsp;</a>
		<a href="member_delete.php">刪除帳號&nbsp;&nbsp;&nbsp;</a><br>
		</p>
		<p>&nbsp;&nbsp;&nbsp;喜好項目</p>
		<!--<UL TYPE="CIRCLE">-->
		<DIV style="margin-left:10px">
		<table width="400" border="0" align="left" cellpadding="4" cellspacing="0">
		<?php
		
			$sql = "SELECT * FROM favorite natural join information WHERE user_ID='".$login["user_ID"]."'";
			//echo $sql;
			$result = mysql_query($sql);
		  for($i=1;$i<=mysql_num_rows($result);$i++)
		  {
			 $rs=mysql_fetch_row($result);
			  echo "<tr><td><a href=\"./information_detail.php?id=".$rs[0]."\">$rs[2]</a></td>";
			  echo "<td><a href=\"./favorite_delete.php?id=".$rs[0]."\">刪除</a></td></tr>";
			  
		  }?>
		  
				
</table>
</DIV>

</body>
</html>
