<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
  //檢查是否已登入
  require_once("login_check.php");
  //查詢登入會員資料
  $sql = "SELECT *, YEAR(birthday) as year, MONTH(birthday) as month, DAYOFMONTH(birthday) as day FROM user WHERE account='".$_SESSION["account"]."'";
  $record = mysql_query($sql);	
  $row = mysql_fetch_assoc($record);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員管理系統</title>
<script language="javascript">
function check_form() {
  if(document.form1.name.value=="") {
    alert("請填寫姓名!");
    return false;
  }
  if(document.form1.email.value=="") {
    alert("請填寫電子郵件!");
    return false;
  }
  return confirm('確定送出嗎？');
}
</script>
</head>
<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td width="600">
      <form action="member_update.php" method="POST" name="form1" onSubmit="return check_form();">
        <p><font size="6" color="#FF0000">修改會員資料</font></p>
        <div>
          <hr size="1" />
          <p><strong>使用帳號</strong>：
            <input name="account" type"text" value="<?php echo $row["account"];?>" disabled="true">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>真實姓名</strong>：
            <input name="name" type="text" value="<?php echo $row["name"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>性　　別</strong>：
            <input name="sex" type="radio" value="男" <?php if($row["sex"]=="男") echo "checked";?>>男
            <input name="sex" type="radio" value="女" <?php if($row["sex"]=="女") echo "checked";?>>女
            <font color="#FF0000">*</font>
          </p>
          <p><strong>生　　日</strong>：
            <select name="year">
              <option <?php if ($row["year"] == "1960") echo "selected";?>>1960</option>
              <option <?php if ($row["year"] == "1961") echo "selected";?>>1961</option>
              <option <?php if ($row["year"] == "1962") echo "selected";?>>1962</option>
              <option <?php if ($row["year"] == "1963") echo "selected";?>>1963</option>
              <option <?php if ($row["year"] == "1964") echo "selected";?>>1964</option>
              <option <?php if ($row["year"] == "1965") echo "selected";?>>1965</option>
              <option <?php if ($row["year"] == "1966") echo "selected";?>>1966</option>
              <option <?php if ($row["year"] == "1967") echo "selected";?>>1967</option>
              <option <?php if ($row["year"] == "1968") echo "selected";?>>1968</option>
              <option <?php if ($row["year"] == "1969") echo "selected";?>>1969</option>
              <option <?php if ($row["year"] == "1970") echo "selected";?>>1970</option>
              <option <?php if ($row["year"] == "1971") echo "selected";?>>1971</option>
              <option <?php if ($row["year"] == "1972") echo "selected";?>>1972</option>
              <option <?php if ($row["year"] == "1973") echo "selected";?>>1973</option>
              <option <?php if ($row["year"] == "1974") echo "selected";?>>1974</option>
              <option <?php if ($row["year"] == "1975") echo "selected";?>>1975</option>
              <option <?php if ($row["year"] == "1976") echo "selected";?>>1976</option>
              <option <?php if ($row["year"] == "1977") echo "selected";?>>1977</option>
              <option <?php if ($row["year"] == "1978") echo "selected";?>>1978</option>
              <option <?php if ($row["year"] == "1979") echo "selected";?>>1979</option>
              <option <?php if ($row["year"] == "1980") echo "selected";?>>1980</option>
              <option <?php if ($row["year"] == "1981") echo "selected";?>>1981</option>
              <option <?php if ($row["year"] == "1982") echo "selected";?>>1982</option>
              <option <?php if ($row["year"] == "1983") echo "selected";?>>1983</option>
              <option <?php if ($row["year"] == "1984") echo "selected";?>>1984</option>
              <option <?php if ($row["year"] == "1985") echo "selected";?>>1985</option>
              <option <?php if ($row["year"] == "1986") echo "selected";?>>1986</option>
              <option <?php if ($row["year"] == "1987") echo "selected";?>>1987</option>
              <option <?php if ($row["year"] == "1988") echo "selected";?>>1988</option>
              <option <?php if ($row["year"] == "1989") echo "selected";?>>1989</option>
              <option <?php if ($row["year"] == "1990") echo "selected";?>>1990</option>
              <option <?php if ($row["year"] == "1991") echo "selected";?>>1991</option>
              <option <?php if ($row["year"] == "1992") echo "selected";?>>1992</option>
              <option <?php if ($row["year"] == "1993") echo "selected";?>>1993</option>
              <option <?php if ($row["year"] == "1994") echo "selected";?>>1994</option>
              <option <?php if ($row["year"] == "1995") echo "selected";?>>1995</option>
              <option <?php if ($row["year"] == "1996") echo "selected";?>>1996</option>
              <option <?php if ($row["year"] == "1997") echo "selected";?>>1997</option>
              <option <?php if ($row["year"] == "1998") echo "selected";?>>1998</option>
              <option <?php if ($row["year"] == "1999") echo "selected";?>>1999</option>
              <option <?php if ($row["year"] == "2000") echo "selected";?>>2000</option>
              <option <?php if ($row["year"] == "2001") echo "selected";?>>2001</option>
              <option <?php if ($row["year"] == "2002") echo "selected";?>>2002</option>
              <option <?php if ($row["year"] == "2003") echo "selected";?>>2003</option>
              <option <?php if ($row["year"] == "2004") echo "selected";?>>2004</option>
              <option <?php if ($row["year"] == "2005") echo "selected";?>>2005</option>
              <option <?php if ($row["year"] == "2006") echo "selected";?>>2006</option>
              <option <?php if ($row["year"] == "2007") echo "selected";?>>2007</option>
              <option <?php if ($row["year"] == "2008") echo "selected";?>>2008</option>
              <option <?php if ($row["year"] == "2009") echo "selected";?>>2009</option>
              <option <?php if ($row["year"] == "2010") echo "selected";?>>2010</option>
            </select>年
            <select name="month">
              <option <?php if ($row["month"] == "1") echo "selected";?>>1</option>
              <option <?php if ($row["month"] == "2") echo "selected";?>>2</option>
              <option <?php if ($row["month"] == "3") echo "selected";?>>3</option>
              <option <?php if ($row["month"] == "4") echo "selected";?>>4</option>
              <option <?php if ($row["month"] == "5") echo "selected";?>>5</option>
              <option <?php if ($row["month"] == "6") echo "selected";?>>6</option>
              <option <?php if ($row["month"] == "7") echo "selected";?>>7</option>
              <option <?php if ($row["month"] == "8") echo "selected";?>>8</option>
              <option <?php if ($row["month"] == "9") echo "selected";?>>9</option>
              <option <?php if ($row["month"] == "10") echo "selected";?>>10</option>
              <option <?php if ($row["month"] == "11") echo "selected";?>>11</option>
              <option <?php if ($row["month"] == "12") echo "selected";?>>12</option>
            </select>月
            <select name="day">
              <option <?php if ($row["day"] == "1") echo "selected";?>>1</option>
              <option <?php if ($row["day"] == "2") echo "selected";?>>2</option>
              <option <?php if ($row["day"] == "3") echo "selected";?>>3</option>
              <option <?php if ($row["day"] == "4") echo "selected";?>>4</option>
              <option <?php if ($row["day"] == "5") echo "selected";?>>5</option>
              <option <?php if ($row["day"] == "6") echo "selected";?>>6</option>
              <option <?php if ($row["day"] == "7") echo "selected";?>>7</option>
              <option <?php if ($row["day"] == "8") echo "selected";?>>8</option>
              <option <?php if ($row["day"] == "9") echo "selected";?>>9</option>
              <option <?php if ($row["day"] == "10") echo "selected";?>>10</option>
              <option <?php if ($row["day"] == "11") echo "selected";?>>11</option>
              <option <?php if ($row["day"] == "12") echo "selected";?>>12</option>
              <option <?php if ($row["day"] == "13") echo "selected";?>>13</option>
              <option <?php if ($row["day"] == "14") echo "selected";?>>14</option>
              <option <?php if ($row["day"] == "15") echo "selected";?>>15</option>
              <option <?php if ($row["day"] == "16") echo "selected";?>>16</option>
              <option <?php if ($row["day"] == "17") echo "selected";?>>17</option>
              <option <?php if ($row["day"] == "18") echo "selected";?>>18</option>
              <option <?php if ($row["day"] == "19") echo "selected";?>>19</option>
              <option <?php if ($row["day"] == "20") echo "selected";?>>20</option>
              <option <?php if ($row["day"] == "21") echo "selected";?>>21</option>
              <option <?php if ($row["day"] == "22") echo "selected";?>>22</option>
              <option <?php if ($row["day"] == "23") echo "selected";?>>23</option>
              <option <?php if ($row["day"] == "24") echo "selected";?>>24</option>
              <option <?php if ($row["day"] == "25") echo "selected";?>>25</option>
              <option <?php if ($row["day"] == "26") echo "selected";?>>26</option>
              <option <?php if ($row["day"] == "27") echo "selected";?>>27</option>
              <option <?php if ($row["day"] == "28") echo "selected";?>>28</option>
              <option <?php if ($row["day"] == "29") echo "selected";?>>29</option>
              <option <?php if ($row["day"] == "30") echo "selected";?>>30</option>
              <option <?php if ($row["day"] == "31") echo "selected";?>>31</option>
            </select>日
            <font color="#FF0000">*</font>
          </p>
          <p><strong>電子郵件</strong>：
            <input name="email" type="text" value="<?php echo $row["email"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>個人網頁</strong>：
            <input name="url" type="text" value="<?php echo $row["url"];?>"><br>
            <span>請以「http://」 為開頭。</span>
          </p>        
          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="1" />
        <p align="center">
          <input name="id" type="hidden" value="<?php echo $row["user_ID"];?>">
          <input type="submit" name="update" value="修改資料">
          <input type="reset" name="reset" value="重設資料">
        </p>
      </form>
    </td>
    <td width="200">
      <?php require_once("menu.php"); ?>
    </td>
  </tr>
</table>
</body>
</html>
