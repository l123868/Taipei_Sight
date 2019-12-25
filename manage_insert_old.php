<?php
	require_once("connMysql.php");
?>

<html>
<head>
<title>新增景點</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table class="outtable">
  <tr><td class="header"><p align="center">[新增景點]</p></td></tr>
  <tr>
	<form action= "manage_do_insert.php" method="post">
	  
          景點ID:<input type="text" name="sight_ID"><br>
          景點名稱:<input type="text" name="sight_name"><br>
	  票價:<input type="text" name="ticket_price"><br>
          官網:<input type="text" name="website"><br>
          季節:
	  <select name="season">
	    <option>春天</option>
            <option>夏天</option>
	    <option>秋天</option>
	    <option>冬天</option>
	  </select>
          <br>
         
	  旅遊類型:
	  <select name="type">
	    <option>宗教</option>
	    <option>古蹟</option>
	    <option>單車</option>
	    <option>生態旅遊</option>
	    <option>展覽</option>
	    <option>圖書館</option>
	    <option>博物館</option>
	    <option>市集</option>
	    <option>港口</option>
	  </select>
          <br>
	  地址:<input type="text" name="location"><br>
	  交通:<input type="text" name="traffic"><br>	 
          <input type="submit" value="新增景點">
</form>
</tr>
</table>
</body>
</html>