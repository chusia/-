<?php require_once('../Connections/gsgf.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--===================JS==========================-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type = "text/javascript" src = "js/CheckEnter.js">
</script>
<!--===================JS==========================-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>

</head>

<body>
<form id = "form1" name = "form1" method = "POST" action = "php/ForgetPsdControl.php"><table width="341" border="1">
  <tr>
    <td width="137">帳號</td>
    <td width="192"><label for="UserID"></label>
      <input type="text" name="UserID" id="UserID" onchange = "CheckIDLength()" required/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="Mail"></label>
      <input type="text" name="Mail" id="Mail" onchange = "CheckEmail()" required/></td>
  </tr>
  <tr>
    <td>生日</td>
    <td><label for="Bday"></label>
      <input type="date" name="BDay" id="BDay" required/></td>
  </tr>
  <tr>
    <td colspan="2">
      <center>
      <div class="g-recaptcha" data-sitekey="6LfuMDcUAAAAALwXBt3CE9iSU5R1ZP7n-Q2C-iAO"></div>
        <p>
          <input type="submit" name="FPSubmit" id="FPSubmit" value="送出" required/>&nbsp;&nbsp;&nbsp;
          <a href="mailto:rahit91201@gmail.com">聯繫管理員</a></p>
      </center>
    </td>
  </tr>
</table></form>
</body>
</html>
<?php

?>