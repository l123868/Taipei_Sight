<?php 
	require_once("connMysql.php");
	$id=$_GET['id'];
	$sql1 = "select *from comment where comment_ID = '$id'";
	$result1 = mysql_query($sql1);
	$row1 = mysql_fetch_assoc($result1);
	$sightID = $row1["sight_ID"];
	$_context = $row1["context"];
	$sql2 = "select * from information where sight_ID = '$sightID'";
	$result2 = mysql_query($sql2);
	$row = mysql_fetch_assoc($result2);
	

	//$sql = "delete FROM comment where comment_ID ='$id'";
	//$result = mysql_query($sql);
	//header("location:./information_detail.php?id=".$row["sight_ID"]."php");
?>



<html>
<head>
<title>景點資訊</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>


   <p colspan="2" align="left" valign="top">   
		 <img src="photo/<?php echo sprintf("%03d", $row1["sight_ID"]); ?>.jpg" alt="照片"   align=left border=0 hspace=30 vspace=10 height=256 width=256>
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
		 echo "<BR>";
		
		  for($i=1;$i<=5;$i++) //just for beauty
			  echo "<BR>";
		  ?>
		  
		  <table width="1000" border="0">
		  		  
			<?//echo "HERR".$login["user_ID"];?>
				  
		  <?php //show all the comment
		  echo "評論:" ;
		  $sql = "SELECT * FROM comment inner join  user on comment.user_ID = user.user_ID where sight_ID ='$sightID'";
		  $result = mysql_query($sql);
		  for($i=1;$i<=mysql_num_rows($result);$i++)
		  {
			 $rs=mysql_fetch_row($result);?>
			 <tr>
			 
			 <td width="200"><?php echo $rs[5]?></td>
			 <td width="200"><?php echo $rs[3]?></td>
			 <td width="200">
			 <?php if($rs[0]==$id) 
			 {
				 //$_context = $rs[3];
				echo "THIS"; 
				//echo "<a href=\"./delete_comment.php?id=".$rs[0]."\">修改</a>"; 
			 }?>
			 </td>
			
			 </tr>
		<?php } ?>
		  
		  <form id="form1" name="form1" method="post" action="comment_update.php">
			<tr><td>修改意見：</td></tr>
			<tr><td><TEXTAREA name="context" type="text" value="" /><?php echo $_context;?></TEXTAREA></tr></td>
			<tr><td><input type="hidden" name="id" value="<?php echo $id;?>" /></tr></td>
			<tr><td><input type="hidden" name="sightID" value="<?php echo $sightID;?>" /></tr></td>			
			<tr><td><input type="submit" name="button" id="button" value="送出" /></tr></td>
			</form>
			</table>
		</p>
		  
		 
		  
		 
		

		
		
</p>
</body>
</html>
