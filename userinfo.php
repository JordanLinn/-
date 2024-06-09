<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="favicon.ico" />
<title>ͼ����Ϣ</title>
<link href="lms.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--***************************header***************************-->
<?php include "data/header.inc"?>
<!--***************************main**************************-->
<center>
<table border="1" width="800" height="30" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
	<tr>
  	<td width="234" align="center">
  	<img src="pics/position.png" alt="position" width="16" height="16" align="absmiddle">&nbsp;���λ��	</td>
    <td><img src="pics/rightdir.png" alt="rightdir" width="16" height="16" align="absmiddle">[&gt;<a href="usermanage.php">�û�����</a>  �û���Ϣ&lt;]</td>
	</tr>
</table>
</center>

<?php 
	$userid = $_GET['userid'];
	require_once "dbaccess.php";
	
	$query = "select * from user where u_id='".$userid."'";
	//echo "$query";
	$result = mysql_query($query);
	if (!$result) {
    	die('Invalid query: ' . mysql_error());
	}
	$rows = mysql_num_rows($result);
	if($rows!=0)
	{
		$rows=$rows-1;
	
		mysql_data_seek($result,$rows);
		$data = @mysql_fetch_array($result);
?>	
<center>
<table border="1" width="800" height="30" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
	<tr>
  	<td width="234" rowspan="10" align="center"><img src="pics/default.png" alt="�û���Ƭ" width="128" height="128"></td>
    <td>��ţ�<?php echo "$data[u_id]"?></td>
	</tr>
	<tr>
  	<td>������<?php echo "$data[u_name]"?></td>
	</tr>
	<tr>
  	<td>�Ա�<?php echo "$data[sex]"?></td>
	</tr>
	<tr>
  	<td>�༶��<?php echo "$data[u_class]"?></td>
	</tr><tr>
  	<td>Ժϵ��<?php echo "$data[u_dept]"?></td>
	</tr>
	<tr>
  	<td>���䣺<?php echo "$data[u_mailbox]"?></td>
	</tr>
	<tr>
  	<td>��¼����<?php echo "$data[u_login]"?></td>
	</tr>
	<tr>
  	<td>��ϵ�绰��<?php echo "$data[u_tel]"?></td>
	</tr>
	<tr>
  	<td>�������£�<?php echo "$data[u_birthdate]"?></td>
	</tr>
	<tr>
  	<td>�û����ͣ�<?php echo "$data[u_type]"?></td>
	</tr>
</table>
</center>
<?php
		}
	//require_once "freeresult.php";
	require_once "dbclose.php";
?>
<!--***************************footer***************************-->
<?php include "data/footer.inc"?>
</body>
</html>
