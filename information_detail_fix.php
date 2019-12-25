 <?php 
	//獲得會員資料
	require_once("connMysql.php");
	session_start();
	$sql = "SELECT * FROM user WHERE account='".$_SESSION["account"]."'";
	$record = mysql_query($sql);
	$login = mysql_fetch_assoc($record);
	//獲得景點資料
	$id=$_GET["id"];
	$sql = "SELECT * FROM information where sight_ID ='$id'";
	$result = mysql_query($sql);
	$row=mysql_fetch_assoc($result);
?>

<html>
<head>
<title>景點資訊</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<script src="jquery-3.4.1.min.js"></script>		
<script>		
function addFav(){		
	$.ajax({		
		url:"favorite_add.php",		
		type: "GET",		
		data: {id : <?php echo '"' . $id . '"' ?>}	
	});	
	$('#add_fav').hide();
	var h = "<button id='delete_fav' onclick='delFav();'>*從我的最愛裡移除*</button>";
	$('#favorite_buttons').html(h);	
}
function delFav(){		
	$.ajax({		
		url:"favorite_delete.php",		
		type: "GET",		
		data: {id : <?php echo '"' . $id . '"' ?>}	
	});	
	$('#delete_fav').hide();
	var h = "<button id='add_fav' onclick='addFav();'>*加到我的最愛*</button>";
	$('#favorite_buttons').html(h);	
}		
</script>
</head>
<body>
<p><a href="./index.php">&nbsp;&nbsp;&nbsp;景點查詢&nbsp;&nbsp;&nbsp;</a>
<a href="javascript:history.back()">&nbsp;&nbsp;&nbsp;回上一頁&nbsp;&nbsp;&nbsp;</a>
	<!--<p colspan="0" align="right" valign="top "> <a href="logout.php">登出&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a><br></p>-->
	<?php   
	if(!isset($_SESSION["account"]) || ($_SESSION["account"]==""))//未登入
	{
		echo '<p colspan="0" align="right" valign="top "> <a href="login_form.php">登入&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a><br></p>';
		
	}
	else//已登入
	{
		echo '<p colspan="0" align="right" valign="top ">';
		echo "Hello, ";
		echo '<a href="member_center.php">'.$login["name"].'</a>';
		echo '<a href="logout.php">&nbsp; &nbsp; &nbsp;登出&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a><br></p>';
		
	}
	?>

   <p colspan="2" align="left" valign="top">   
    
		 <img src="photo/<?php echo sprintf("%03d", $id); ?>.jpg" alt="照片"   align=left border=0 hspace=30 vspace=10 height=256 width=256>
		
		 <?php
		 
		 echo "<BR>";
         echo $row["sight_name"];
		 echo "<BR>";
		 echo "票價: ".$row["ticket_price"];
		 echo "<BR>";
		 echo "適合旅遊季節: ".$row["season"];
		 echo "<BR>";
		 echo "地址: ".$row["location"];
		 echo "<BR>";
		 echo "交通: ".$row["traffic"];
		 echo "<BR>";
		 echo "官網:" ;
		 echo "<a href=".$row["website"].">".$row["website"]."</a>";
		 echo "<BR>";
		 //echo "ID: ";
		 //echo sprintf("%03d", $id);
		 echo "<BR><span id='favorite_buttons'>";
		 //確認是否已加到我的最愛
		$loginID = $login["user_ID"];
		$sql = "SELECT * FROM favorite where sight_ID ='$id' and user_ID = '$loginID'";
		$result = mysql_query($sql);
		$nums=mysql_num_rows($result);
		 if(isset($_SESSION["account"]) && $nums>0)
		 {
			  //echo "*已加入我的最愛* &nbsp;&nbsp;&nbsp;";
			  echo "<button id='delete_fav' onclick='delFav();'>*從我的最愛裡移除*</button>";
		 }
		 else if(isset($_SESSION["account"])) echo "<button id='add_fav' onclick='addFav();'>*加到我的最愛*</button>";
		  for($i=1;$i<=4;$i++) //just for beauty
			  echo "</span><BR>";
		  ?>
		   
		  <table width="1200" border="0">
		  <style type="text/css">
table {

table-layout: fixed;

word-break: break-all;

}
</style>
		  
		  
		  
				  
		  <?php //show all the comment
		  echo "評論:" ;
		  $sql = "SELECT * FROM comment inner join  user on comment.user_ID = user.user_ID where sight_ID ='$id'";
		  $result = mysql_query($sql);?>
		  <tr>
			 
			 <td width="200">用戶名稱</td>
			 <td width="800">評論內容</td>
		  </tr>
		  <?php
		  for($i=1;$i<=mysql_num_rows($result);$i++)
		  {
			 $rs=mysql_fetch_row($result);?>
			 <tr>
			 
			 <td width="200"><?php echo $rs[5]?></td>
			 <td width="200"><?php echo $rs[3]?></td>
			 <td width="200">
			 <?php if($rs[1]==$login["user_ID"]) 
			 {
				echo "<a href=\"./comment_delete.php?id=".$rs[0]."\">&nbsp; &nbsp; &nbsp;刪除&nbsp; &nbsp; &nbsp; </a>"; 
				echo "<a href=\"./comment_update_form.php?id=".$rs[0]."\">修改</a>"; 
			 }?>
			 </td>
			
			 </tr>
			 <?php } ?>
		  
			<?php
			if(!isset($_SESSION["account"]) || ($_SESSION["account"]==""))//未登入
			{
				echo '<tr width="200"><td><font color="#ff8000">請先登入再發表評論</font></td></tr>';
		
			}
			else{
			?>
		  <form id="form1" name="form1" method="post" action="comment_join.php">
			<tr><td width="200">請輸入您的意見(盡量以中文輸入)：</td></tr>
			<tr><td width="200"><TEXTAREA name="context" type="text" value="" /> </TEXTAREA></tr></td>
			<input type="hidden" name="userID" id="userID" value="<?php echo $login["user_ID"];?>" />
			<input type="hidden" name="sightID" id="sightID" value="<?php echo $id;?>" />
			<tr><td><input type="submit" name="button" id="button" value="送出" /></tr></td>
			</form>
			<?php
			}
			?>
			</table>
			
		</p>
		  
		 
		  
		 
		

		
		
</p>
</body>
</html>