<?php
	require_once("connMysql.php");
	$sql = "SELECT * FROM information";
	$result_sight = mysql_query($sql);
	//$records_per_row=3;
?>

<html>
<head>
<title>所有景點</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<a href=\"./information_detail.php?id=".$id."\">$name</a>
<td>
  <a href="./manage_insert.php">新增景點</a>
  <a href="./data_anslyzing.php">資料分析</a>
</td>
<table class="outtable">
<p align="center">[所有景點]<BR></p></td></tr>
</table>
<style>
div{
 overflow:auto;
 width:100%;
 height:800px; /* 固定高度 */
}

td, th {
 border:1px solid gray;
 width:170px;
 height:30px;
 text-align:center;
}

th {
 background-color:lightblue;
}

table {
 table-layout: fixed;
 width:300px; /* 固定寬度 */
}

td:first-child, th:first-child {
 position:sticky;
 left:0; /* 首行永遠固定於左 */
 z-index:1;
 background-color:lightpink;
}

thead tr th {
 position:sticky;
 top:0; /* 列首永遠固定於上 */
}

th:first-child{
 z-index:2;
 background-color:lightblue;
}
</style>

<div>
<table width='1000' height=80 align='center'>
<thead>
<tr>
  
  <th>景點ID</th>
  <th>景點名稱</th>
  <th>類型</th>
  <th>票價</th>
  <th>地址</th>
  <th>交通</th>
  <th>修改</th>
  <th>刪除</th>
</tr>
</thead>
<tbody>
      <?php
      //顯示記錄
	  
      while($row_sight=mysql_fetch_assoc($result_sight))
	  {
		  echo "<tr>";
	      echo "<td>";
		  echo $row_sight["sight_ID"];
		  echo "</td>";
		  echo "<td>";
		  echo $row_sight["sight_name"];
		  echo "</td>";
		  echo "<td>";
		  echo $row_sight["type_name"];
		  echo "</td>";
                  echo "<td>";
		  echo $row_sight["ticket_price"];
		  echo "</td>";
                 
                  echo "<td>";
		  echo $row_sight["location"];
		  echo "</td>";
                  echo "<td>";
		  echo $row_sight["traffic"];
		  echo "</td>";
		  echo "<td>";
	      echo "<a href=\"./manage_update.php?update_id=".$row_sight["sight_ID"]."\">修改</a>";
		  echo "</td>";
		  echo "<td>";
		  echo "<a href=\"./manage_delete.php?delete_id=".$row_sight["sight_ID"]."\">刪除</a>";
		  echo "</td>";
		  
	  }
      ?>
</tbody>
</table>

</body>
</html>
