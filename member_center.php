<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
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
				<?php
					if($login["account"]=="manager8"){
						?>
						<div class="actions small">
							<div  class="align-right">
								<a href="./manage_show.php" class="button">景點修改</a>
							</div>
						</div>
					<?php } ?>
					<header class="align-left">
						<h2>member center</h2>
						<p>Hello, <?php echo $login["name"]?></p>
					</header>
					<div  class="align-right">
						<a href="member_update_form.php">修改資料</a>
						&nbsp;&nbsp;&nbsp;
						<a href="member_change_password_form.php">修改密碼</a>
						&nbsp;&nbsp;&nbsp
						<a href="member_delete.php">刪除帳號</a><br>
					</div>
					<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th>Favorite</th>
								</tr>
							</thead>
							<tbody>
								
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