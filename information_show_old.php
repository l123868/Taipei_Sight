<?php
	require_once("connMysql.php");
	
	
	
	
	$type=$_POST["type"];
	$sql = "SELECT * FROM information where type_name ='$type'";
	$result_sight = mysql_query($sql);
	$records_per_row=3;
?>

<html>
<head>
<title>景點類</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table class="outtable">
  <tr><td class="header"><p align="center">[景點類]<BR></p></td>
      <td colspan="2" align="center" valign="top">
      <?php
      //顯示記錄
      $j = 1;
	  
      while($row_sight=mysql_fetch_assoc($result_sight))
	  {
		  $name=$row_sight["sight_name"];
		  $id=$row_sight["sight_ID"];
		  
		  echo "<table width='250' height=80 border='2' align='center'><tr>";
	      echo "<td align='center' width='200'>";
		  echo "<a href=\"./information_detail.php?id=".$id."\">$name</a>";
		  echo "</td>";
	      echo "</tr></table>";
          $j++;
	  }
      ?>
      </td>
  </tr>
</table>
</body>
</html>
