<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="favicon.ico" />
<title>ͼ����Ϣ�޸�</title>
<link href="lms.css" rel="stylesheet" type="text/css">
<script>
<!--
	function validateform()
	{
		if(document.bookinfo.mainname.value == "")
		{
			window.alert ("������ͼ������!")
			return false;
		}
		if(document.bookinfo.pressdate.value == "")
		{
			window.alert ("������ͼ��ĳ�������!")
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
    <td><img src="pics/rightdir.png" alt="rightdir" width="16" height="16" align="absmiddle">[&gt;<a href="bookmanage.php">ͼ�����</a>:ͼ����Ϣ�޸�&lt;]</td>
	</tr>
</table>
</center>

<?php 
	$bookid = $_GET['bookid'];
	require_once "dbaccess.php";
	
	$query = "select * from book where b_id='".$bookid."'";
	$result = mysql_query($query);
	if (!$result) {
    	die('Invalid query: ' . mysql_error());
	}
	$rows = mysql_num_rows($result);
	for($i=0;$i<$rows;$i++)
	{
		mysql_data_seek($result,$rows-1);
		$data = @mysql_fetch_array($result);
?>	
<center>
  <table border="0" width="800" cellspacing="0" cellpadding="0">
  	<tr>
	<td width="100%">
	<form enctype="multipart/form-data" method="post" action="bookmodifyprocess.php" name="bookinfo" onSubmit="return validateform( this.form )">
	<table border="1" width="100%" bgcolor="#E4E4E4" cellpadding="0" cellspacing="0" bordercolorlight="#C0C0C0" bordercolordark="#FFFFFF">
	<tr>
		<td width="34%" align="center">ͼ �� �� ��:</td>
		<td width="66%" colspan="5">
			<input type="text" name="mainname" size="30" value="<?php echo "$data[b_mname]"?>">
			<input type="hidden" name="bookid" size="30" value="<?php echo "$data[b_id]"?>">
			<font color="#8080C0">*</font>		</td>
	</tr>
	<tr>
		<td width="34%" align="center">ͼ �� �� ��:</td>
		<td width="66%" colspan="5">
			<input type="text" name="byname" size="30" value="<?php echo "$data[b_bname]"?>">
		</td>
	</tr>
	<tr>
		<td width="34%" align="center">ͼ �� �� ��:</td>
		<td width="66%" colspan="5">
			<input type="text" name="bookversion" size="30" value="<?php echo "$data[b_version]"?>">
		<font color="#8080C0">����ʽ:���֡�</font></td>
	</tr>
	<tr>
		<td width="34%" align="center">�� �� �� ��:</td>
		<td width="66%" colspan="5">
			<input type="text" name="author" size="30" value="<?php echo "$data[b_author]"?>">
		</td>
	</tr>
	<tr>
		<td width="34%" align="center">�� �� �� ��:</td>
		<td width="66%" colspan="5">
			<input type="text" name="press" size="30" value="<?php echo "$data[b_press]"?>">
		</td>
	</tr>
	<tr>
		<td width="34%" align="center">ͼ �� �� ��:</td>
		<td width="66%" colspan="5">
			<input type="text" name="bookprice" size="30" value="<?php echo "$data[b_price]"?>">
			<font color="#8080C0">��</font>
		</td>
	</tr>
	<tr>
		<td width="34%" align="center">ͼ �� �� ��</td>
		<td width="66%" colspan="5">
			<input type="text" name="type" size="30" value="<?php echo "$data[b_type]"?>">		</td>
	</tr>
	<tr>
		<td width="34%" align="center">�� �� �� ��:</td>
		<td width="66%" colspan="5">
			<input type="text" name="pressdate" size="30" value="<?php echo "$data[b_pdate]"?>">
		<font color="#8080C0">*����ʽ:��2008-08-08��</font></td>
	</tr>
	<tr>
		<td width="34%" align="center">ͼ �� �� ��:</td>
		<td width="66%" colspan="5">
			<input type="text" name="booknum" size="30" value="<?php echo "$data[b_num]"?>">
			<font color="#8080C0">*</font>
		</td>
	</tr>
	<tr>
		<td width="34%" align="center" valign="top">ͼ �� �� ��:</td>
		<td width="66%" colspan="5">
			<textarea name="bookintro" cols="50" rows="10"></textarea>
		</td>
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
<?php
	}
	require_once "freeresult.php";
	require_once "dbclose.php";
?>
<!--***************************footer***************************-->
<?php include "data/footer.inc"?>
</body>
</html>
