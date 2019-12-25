<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  //新增
	$sex = $_POST['sex'];

		$data=mysql_query("select * from favorite natural join user natural join information where sex = '$sex'" );
		
?>
<html>
<head>
<title>資料分析</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">

</head>
	<body>
		<form name="form1" method="post" action="">
			<p><strong>資料分析</strong>：
				<input type="radio" name="sex" value="男" checked>男
				<input type="radio" name="sex" value="女">女
				<input type="submit" name="button" value="查詢">
			</p>
		</form>
		<DIV style="margin-left:10px">
		<table width="400" border="0" align="left" cellpadding="4" cellspacing="0">
		<p>查詢結果 性別: <?php echo $sex;?></p
		<tr><td>使用者名稱</td><td>景點名稱</td></tr>
		<?php
		  for($i=1;$i<=mysql_num_rows($data);$i++)
		  {
			 $rs=mysql_fetch_row($data);
			  echo "<tr><td>$rs[2]</td>";
			  echo "<td><a href=\"./information_detail.php?id=".$rs[1]."\">$rs[9]</a></td></tr>";
		  }?>
		  
				
</table>
</DIV>
		
		
		
		
	</body>
</html>