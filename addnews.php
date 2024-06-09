<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "superadmin";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "error.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="favicon.ico" />
<title>��������</title>
<link href="lms.css" rel="stylesheet" type="text/css">

<script>
<!--
	function validateform()
	{
		if(document.news.newsname.value == "")
		{
			window.alert ("��������������!")
			return false;
		}
		if(document.news.newscontent.value == "")
		{
			window.alert ("��������������!")
			return false;
		}
	}
//-->
</script>
</head>
<body>
<!--***************************header***************************-->
<?php include "data/header.inc"?>
<!--***************************main**************************-->
<center>
<table border="1" width="800" height="30" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
	<tr>
  	<td width="234" align="center">
  	<img src="pics/position.png" alt="position" width="16" height="16" align="absmiddle">&nbsp;���λ��</td>
    <td><img src="pics/rightdir.png" alt="rightdir" width="16" height="16" align="absmiddle">[&gt;��������&lt;]</td>
	</tr>
</table>
</center>
<center>
  <table border="0" width="800" cellspacing="0" cellpadding="0">
  	<tr>
	<td width="100%">
	<form enctype="multipart/form-data" method="post" action="addnewsprocess.php" name="news" onSubmit="return validateform( this.form )">
	<table border="1" width="100%" bgcolor="#E4E4E4" cellpadding="0" cellspacing="0" bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">
	<tr>
		<td width="20%" align="center">�� �� �� ��:</td>
		<td width="80%" colspan="5">
			<input type="text" name="newsname" size="30">
			<font color="#8080C0">*</font>		</td>
	</tr>
	<tr>
		<td width="20%" align="center">�� �� �� ��:</td>
		<td width="80%" colspan="5">
		&nbsp;&nbsp;
		����
		<input type="radio" name="newstype" value="newsmsg" checked="checked">
		ϵͳ��Ϣ
		<input type="radio" name="newstype" value="systemmsg">
		</td>
	</tr>
	<tr>
		<td width="20%" align="center" valign="top">�� �� �� ��:</td>
		<td width="80%" colspan="5">
			<textarea name="newscontent" cols="80" rows="50"></textarea>
			<font color="#8080C0">*</font>		</td>
	</tr>
	<tr>
		<td colspan="6" align="center">
		<input type="reset" value="�� �� �� д" name="reset">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" value="�� �� �� Ϣ" name="submit">		</td>
	</tr>
	</table>
	</form>
	</td>
	</tr>
  </table>
</center>
<!--***************************footer***************************-->
<?php include "data/footer.inc"?>
</body>
</html>
