<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
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
<?php
	//依類型查詢
	require_once("connMysql.php");
	$type=$_POST["type"];
	$sql = "SELECT * FROM information where type_name ='$type'";
	$result_sight = mysql_query($sql);
	$records_per_row=3;
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
				<div class="inner">
					<header class="align-center">
						<h1 >Category <?php echo $type;?></h1>
					</header>
					<div class="image fit">
						<img src="images/pic05.jpg" alt="" />
					</div>
					<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th>Name</th>
									<!--<th>Description</th>
									<th>Price</th>-->
								</tr>
							</thead>
							<tbody>
								
									<?php
										//顯示記錄
										$j = 1;
										while($row_sight=mysql_fetch_assoc($result_sight))
										{
											$name=$row_sight["sight_name"];
											$id=$row_sight["sight_ID"];
											echo "<tr><td><a href=\"./information_detail.php?id=".$id."\">$name</a></td></tr>";
											 $j++;
										}
									?>
							</tbody>
						</table>
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