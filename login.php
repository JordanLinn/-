<?php require_once('Connections/connectLMS.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "u_type";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connectLMS, $connectLMS);
  	
  $LoginRS__query=sprintf("SELECT u_login, u_password, u_type FROM user WHERE u_login='%s' AND u_password='%s'",
  get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $connectLMS) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'u_type');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û���½</title>
<script>
<!--
	function validateform()
	{
		if(document.checkuser.username.value == "")
		{
			window.alert ("��������ĵ�¼��!")
			return false;
		}
		if(document.checkuser.password.value == "")
		{
			window.alert ("���벻��Ϊ��!")
			return false;
		}
	}
//-->
</script>
</head>
<body>
<br />
<br />
<br />
<br />
<br />
<center>
�û���½
</center>
<center>
<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" name="checkuser" onSubmit="return validateform( this.form )">
<table border="1">
<tr>
<td>
��¼��:
</td>
<td>
<input type="text" name="username" size="20"/>
<font color="#8080C0">*</font>
</td>
</tr>
<!--*********************************-->

<tr>
<td>
�� ��:
</td>
<td>
<input type="password" name="password" size="20"/>
<font color="#8080C0">*</font>
</td>
</tr>
<!--*********************************-->

<!--*********************************-->

<tr>
<td colspan="2" align="center">
<input type="reset" value="����" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="�ύ" />
</td>
</tr>
</table>
</form>
</center>
</body>
</html>
