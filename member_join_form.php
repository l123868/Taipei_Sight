<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>會員管理系統</title>
  <script language="javascript">
  function check_form() {
	  var acct = document.form1.account.value;
	  if(acct=="") {		
		  alert("請填寫帳號!");
		  return false;
	  } 
		if(acct.length<5 || acct.length>20){
			alert( "您的帳號長度只能5至20個字元!");
			return false;
		}
	  var pw1 = document.form1.password1.value;
	  var pw2 = document.form1.password2.value;
	  if(pw1=="") {
		  alert("密碼不可以空白!");
		  return false;
	  }
	  for(var i=0; i<pw1.length; i++) {
		  if(pw1.charAt(i)==" " || pw1.charAt(i)=="\"") {
			  alert("密碼不可以含有空白或雙引號!\n");
			  return false;
		  }
	  }
	  if(pw1.length<5 || pw1.length>20) {
		  alert("密碼長度只能5到20個字元!\n" );
		  return false;
	  }
	  if(pw1!=pw2) {
		  alert("兩次輸入密碼不一樣,請重新輸入!\n");
		  return false;
	  }
	  if(document.form1.name.value=="") {
		  alert("請填寫姓名!");
		  return false;
	  }
	  if(document.form1.email.value=="") {
		  alert("請填寫電子郵件!");
		  return false;
	  }
	  return confirm("確定送出？");
  }
  </script>
</head>
<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td width="600">
    	<form name="form1" method="post" action="member_join.php" onSubmit="return check_form();">
        <p><font size="6" color="#FF0000">加入會員</font></p>
		  	<?php if(isset($_GET["registered"])){?>
          <div>帳號 <?php echo $_GET["account"];?> 已經有人使用！</div>
        <?php }?>
        <div>
          <hr size="1" />
          <p><strong>使用帳號</strong>：
          	<input type="text" name="account">
          	<font color="#FF0000">*</font>
          </p>
          <p><strong>使用密碼</strong>：
            <input type="password" name="password1">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>確認密碼</strong>：
            <input type="password" name="password2">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>真實姓名</strong>：
            <input type="text" name="name">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>性　　別</strong>：
            <input type="radio" name="sex" value="男" checked>男
            <input type="radio" name="sex" value="女">女
            <font color="#FF0000">*</font>
          </p>
          <p><strong>生　　日</strong>：
          	<select name="year">
          		<option>1960</option>
          		<option>1961</option>
          		<option>1962</option>
          		<option>1963</option>
          		<option>1964</option>
          		<option>1965</option>
          		<option>1966</option>
          		<option>1967</option>
          		<option>1968</option>
          		<option>1969</option>
          		<option>1970</option>
          		<option>1971</option>
          		<option>1972</option>
          		<option>1973</option>
          		<option>1974</option>
          		<option>1975</option>
          		<option>1976</option>
          		<option>1977</option>
          		<option>1978</option>
          		<option>1979</option>
          		<option>1980</option>
          		<option>1981</option>
          		<option>1982</option>
          		<option>1983</option>
          		<option>1984</option>
          		<option>1985</option>
          		<option>1986</option>
          		<option>1987</option>
          		<option>1988</option>
          		<option>1989</option>
          		<option>1990</option>
          		<option>1991</option>
          		<option>1992</option>
          		<option>1993</option>
          		<option>1994</option>
          		<option>1995</option>
          		<option>1996</option>
          		<option>1997</option>
          		<option>1998</option>
          		<option>1999</option>
          		<option>2000</option>
          		<option>2001</option>
          		<option>2002</option>
          		<option>2003</option>
          		<option>2004</option>
          		<option>2005</option>
          		<option>2006</option>
          		<option>2007</option>
          		<option>2008</option>
          		<option>2009</option>
          		<option>2009</option>
          		<option>2010</option>
          	</select>年
          	<select name="month">
          		<option>1</option>
          		<option>2</option>
          		<option>3</option>
          		<option>4</option>
          		<option>5</option>
          		<option>6</option>
          		<option>7</option>
          		<option>8</option>
          		<option>9</option>
          		<option>10</option>
          		<option>11</option>
          		<option>12</option>
          	</select>月
          	<select name="day">
          		<option>1</option>
          		<option>2</option>
          		<option>3</option>
          		<option>4</option>
          		<option>5</option>
          		<option>6</option>
          		<option>7</option>
          		<option>8</option>
          		<option>9</option>
          		<option>10</option>
          		<option>11</option>
          		<option>12</option>
          		<option>13</option>
          		<option>14</option>
          		<option>15</option>
          		<option>16</option>
          		<option>17</option>
          		<option>18</option>
          		<option>19</option>
          		<option>20</option>
          		<option>21</option>
          		<option>22</option>
          		<option>23</option>
          		<option>24</option>
          		<option>25</option>
          		<option>26</option>
          		<option>27</option>
          		<option>28</option>
          		<option>29</option>
          		<option>30</option>
          		<option>31</option>
          	</select>日
            <font color="#FF0000">*</font><br>
          </p>
          <p><strong>電子郵件</strong>：
            <input type="text" name="email">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>個人網頁</strong>：
            <input type="text" name="url"><br>
            <span>請以「http://」 為開頭。</span>
          </p>
          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="1" />
        <p align="center">
          <input type="submit" name="join" value="加入會員">
          <input type="reset" name="reset" value="重設資料">
        </p>
      </form>
    </td>
  </tr>
</table>
</body>
</html>