<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<?php
	require_once("connMysql.php");
	session_start();
	require_once("login_check.php");
	$sql = "SELECT * FROM user WHERE account='".$_SESSION["account"]."'";
	$record = mysql_query($sql);
	$login = mysql_fetch_assoc($record);
	if($login["account"]!="manager8")
	{ 
		header("location:./index.php"); 
	}
	$sql2 = "SELECT * FROM information";
	$result_sight = mysql_query($sql2);
?>

<html>
	<head>
		<title>Generic - Intensify by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<nav class="left">
					<a href="#menu"><span>Menu</span></a>
				</nav>
				<a href="index.php" class="logo">Taipei Sight</a>
				<nav class="right">
					<?php   
					if(!isset($_SESSION["account"]) || ($_SESSION["account"]==""))//未登入
					{
					?>
					<a href="login_form.php" class="button alt">Log in</a>
					<?php 
					}
					else//已登入
					{
				
						echo "Hello, ";
						echo '<a href="member_center.php">'.$login["name"].'</a>';
						echo '<a href="logout.php">&nbsp; &nbsp; &nbsp;登出&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a><br>';
					}
					?>
				</nav>
			</header>

		<!-- Menu -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Search</a></li>
					<li><a href="member_center.php">Mypage</a></li>
				</ul>
				<ul class="actions vertical">
					<li><a href="#" class="button fit">Login</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<!--<div class="inner">-->
				<div style="margin-left:50px" "margin-right:50px">
				<div style="margin-right:50px">
					<header class="align-center">
						<h1 >Sight Information</h1>
						
					</header>
					<div  class="align-right">
						<a href="./manage_insert.php">新增景點</a>
						&nbsp;&nbsp;&nbsp;
						<a href="./data_analyzing.php">資料分析</a>
						&nbsp;&nbsp;&nbsp;
					</div>
					<BR>
					<div class="table-wrapper">
						<table>
						 <style type="text/css">
							table {
							word-break: break-all;
							}
							</style>
							<thead>
								<tr>
									<th>sight_ID</th>
									<th>sight_name</th>
									<th>ticket_price</th>
									<th>website</th>
									<th>season</th>
									<th>type_name</th>
									<th>location</th>
									<th>traffic</th>
								</tr>
							</thead>
							<tbody>
								<?php //顯示記錄 
									while($row_sight=mysql_fetch_assoc($result_sight))
									{
										echo "<tr><td width='20'>".$row_sight["sight_ID"]."</td>";
										echo "<td width='25'><a href=\"./information_detail.php?id=".$row_sight["sight_ID"]."\">".$row_sight["sight_name"]."</a></td>";
										echo "<td width='20'>".$row_sight["ticket_price"]."</td>";
										echo "<td width='125'><a href=".$row["website"].">".$row_sight["website"]."</a></td>";
										echo "<td width='20'>".$row_sight["season"]."</td>";
										echo "<td width='20'>".$row_sight["type_name"]."</td>";
										echo "<td width='50'>".$row_sight["location"]."</td>";
										echo "<td width='50'>".$row_sight["traffic"]."</td>";
										echo "<td width='20'><a href=\"./manage_update.php?update_id=".$row_sight["sight_ID"]."\">修改</a></td>";
										echo "<td width='20'><a href=\"./manage_delete.php?delete_id=".$row_sight["sight_ID"]."\">刪除</a></td></tr>";

									}?>
							</tbody>
						</table>
					</div>
					
				</div>
				</div>
			</section>

		<!-- Footer -->
			<!--<footer id="footer">
				<div class="inner">
					<h2>Get In Touch</h2>
					<ul class="actions">
						<li><span class="icon fa-phone"></span> <a href="#">(000) 000-0000</a></li>
						<li><span class="icon fa-envelope"></span> <a href="#">information@untitled.tld</a></li>
						<li><span class="icon fa-map-marker"></span> 123 Somewhere Road, Nashville, TN 00000</li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. Design <a href="https://templated.co">TEMPLATED</a>. Images <a href="https://unsplash.com">Unsplash</a>.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>