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
	$id=$_GET["update_id"];
	$sql2 = "SELECT * FROM information where sight_ID ='$id'";
	$result_sight = mysql_query($sql2);
	$row_sight=mysql_fetch_assoc($result_sight);
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
						<h1 >Add New Sight</h1>
						
					</header>
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
								<form id="form1" name="form1" method="post" action="manage_do_update.php">
								<div class="12u$">
									<tr><td width='20'><?php echo $row_sight["sight_ID"]?></td>
									<td width='25'><input type="text" name="sight_name" value = "<?php echo $row_sight["sight_name"];?>"></td>
									<td width='25'><input type="text" name="ticket_price" value = "<?php echo $row_sight["ticket_price"];?>"></td>
									<td width='25'><input type="text" name="website" value = "<?php echo $row_sight["website"];?>"></td>
									
									<td width='25'><select name="season">
													<option selected = "<?php if($row_sight["type_name"]=="春天") echo "true";?>">春天</option>
													<option selected = "<?php if($row_sight["type_name"]=="夏天") echo "true";?>">夏天</option>
													<option selected = "<?php if($row_sight["type_name"]=="秋天") echo "true";?>">秋天</option>
													<option selected = "<?php if($row_sight["type_name"]=="冬天") echo "true";?>">冬天</option>
													</td></select>
									<td width='25'><select name="type_name">
													<option selected = "<?php if($row_sight["type_name"]=="宗教") echo "true";?>">宗教</option>
													<option selected = "<?php if($row_sight["type_name"]=="古蹟") echo "true";?>">古蹟</option>
													<option selected = "<?php if($row_sight["type_name"]=="生態旅遊") echo "true";?>">生態旅遊</option>
													<option selected = "<?php if($row_sight["type_name"]=="展覽") echo "true";?>">展覽</option>
													<option selected = "<?php if($row_sight["type_name"]=="古蹟") echo "true";?>">圖書館</option>
													<option selected = "<?php if($row_sight["type_name"]=="圖書館") echo "true";?>">博物館</option>
													<option selected = "<?php if($row_sight["type_name"]=="市集") echo "true";?>">市集</option>
													<option selected = "<?php if($row_sight["type_name"]=="港口") echo "true";?>">港口</option>
													</select></td>
									<td width='25'><input type="text" name="location" value = "<?php echo $row_sight["location"];?>"></td>
									<td width='25'><input type="text" name="traffic" value = "<?php echo $row_sight["traffic"];?>"></td>
									<input type="hidden" name="sight_ID" value = "<?php echo $id;?>"><br>
								</div>
							</tbody>
						</table>
									
								
								<!-- Break -->
								
								
								<div class="actions small">
									<div  class="align-right">
								<BR>
									<input type="submit" name="button" id="button" value="Send" class="button" />
								</div>
								</div>
								
								</form>
							
							
							
							
							
							
								
							
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