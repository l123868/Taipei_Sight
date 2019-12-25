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
		<title>Generic - Intensify by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="jquery-3.4.1.min.js"></script>		
		<script>		
		function addFav(){		
			$.ajax({		
				url:"favorite_add.php",		
				type: "GET",		
				data: {id : <?php echo '"' . $id . '"' ?>}	
			});	
			$('#add_fav').hide();
			var h = "<button id='delete_fav' onclick='delFav();' class='button alt'>從我的最愛裡移除</button>";
			$('#favorite_buttons').html(h);	
		}
		function delFav(){		
			$.ajax({		
				url:"favorite_delete.php",		
				type: "GET",		
				data: {id : <?php echo '"' . $id . '"' ?>}	
			});	
			$('#delete_fav').hide();
			var h = "<button id='add_fav' onclick='addFav();' class='button alt'>加到我的最愛</button>";
			$('#favorite_buttons').html(h);	
		}		
		</script>
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
					<div class="flex-item right">
						
							<!--<img src="images/pic01.jpg" alt="" />-->
								<div class="actions small">
									<div  class="align-right">
									<span id='favorite_buttons'>
										<?php
											//確認是否已加到我的最愛
											$loginID = $login["user_ID"];
											$sql = "SELECT * FROM favorite where sight_ID ='$id' and user_ID = '$loginID'";
											$result = mysql_query($sql);
											$nums=mysql_num_rows($result);
											if(isset($_SESSION["account"]) && $nums>0)
											{
												echo "<button id='delete_fav' onclick='delFav();'  class='button alt'>從我的最愛裡移除</button>";
											}
											else if(isset($_SESSION["account"]))
											{
												echo "<button id='add_fav' onclick='addFav();' class='button alt'>加到我的最愛</button>";
											}
										?>
										</span>
									</div>
								</div>
								<p><span class="image left"><img src="photo/<?php echo sprintf("%03d", $id); ?>.jpg"" alt="" /></span></p>
								<?
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
								 echo "官網: " ;
								 echo "<a href=".$row["website"].">".$row["website"]."</a>";
								 //echo "ID: ";
								 //echo sprintf("%03d", $id);
								 echo "<BR>";
								 
								  for($i=1;$i<=10;$i++) //just for beauty
									  echo "<BR>";
								  ?>
						</div>
						<div class="inner">
						
							<div class="table-wrapper">
								<table>
								<dt>評論</dt>
									<?php //show all the comment
									  $sql = "SELECT * FROM comment inner join  user on comment.user_ID = user.user_ID where sight_ID ='$id'";
									  $result = mysql_query($sql);?>
									<thead>
										<tr>
											<th>User</th>
											<th>Comment</th>
										</tr>
									</thead>
									<tbody>
										<?php
											for($i=1;$i<=mysql_num_rows($result);$i++)
											{
												$rs=mysql_fetch_row($result);
												$userName = $rs['user.name'];
												$con = $rs["context"];
												$commentID = $rs["comment_ID"];
												?>
												<tr>					 
													<td><?php echo $rs[5]; ?></td>
													<td><?php echo $rs[3];?></td>			
													<?php
													if($rs[1]==$login["user_ID"]) 
													{
														echo "<td><a href=\"./comment_delete.php?id=".$rs[0] ."\">刪除</a></td>"; 
														echo "<td><a href=\"./comment_update_form.php?id=".$rs[0] ."\">修改</a></td>"; 
													}
													else
													{
														echo "<td>&nbsp;</td>"; 
														echo "<td>&nbsp;</td>"; 
													}
													?>	
													
												</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						
							<?php
								if(!isset($_SESSION["account"]) || ($_SESSION["account"]==""))//未登入
								{
									echo '<font color="#ff8000">請先登入再發表評論</font>';
								}
								else{
								?>
								<BR><BR>
							<form id="form1" name="form1" method="post" action="comment_join.php">
								<div class="12u$">
									<textarea name="context" id="context" placeholder="Enter your message" rows="6"></textarea>
									<input type="hidden" name="userID" id="userID" value="<?php echo $login["user_ID"];?>" />
									<input type="hidden" name="sightID" id="sightID" value="<?php echo $id;?>" />
								</div>
								<!-- Break -->
								<div class="3u$ 12u$(small)">
								<BR>
									<input type="submit" value="Send Message" class="fit" />
								</div>
							</form>
							<?php } ?>
						
							
							
							
							
							
							
						</div>
						
					</div>
				</section>
		
		
		
		
		
		
		
		
		
	<!--	
		
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1 >Name <?php echo $sightname;?></h1>
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
									<th>Price</th>
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
									if($j==1)
									{
									 echo 沒有相近名稱景點;
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