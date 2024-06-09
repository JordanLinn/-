<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="favicon.ico" />
<title>��ӭ����ͼ�����ϵͳ</title>
<link href="lms.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--***************************header***************************-->
<?php include "data/header.inc"?>

<?php include "data/timemsg.inc"?>
<!--***************************main**************************-->
<?php
	require_once "dbaccess.php"; // ����-�������ݿ�
	
	$query = "SELECT n_name, n_date FROM news WHERE n_type = 'newsmsg' ORDER BY n_date DESC";
	$result = mysql_query($query);
	$rows = mysql_num_rows($result);
?>
<center>
<table border="1" width="800" height="30" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
	<tr>
  	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="pics/news.png" alt="����" width="50" height="50" align="absmiddle"><strong><font color="#66CCFF" size="10">����</font></strong>[��<font color="#FF6600"><? echo "$rows"?></font>��][<a href="addnews.php">��������</a>]</td>
    <td align="center">[<a href="login.php">��¼</a>]</td>
	</tr>
</table>
</center>
<?php
	if($rows>10)
	{
		$newrows=10;//�ж���Ϣ�Ƿ񳬹�������ʾ������
	}
	else
	{
		$newrows=$rows;
	}
	for($i=0;$i<$newrows;$i++)
		{
			mysql_data_seek($result,$i);
			$data = @mysql_fetch_array($result);
			$newsdate = $data[n_date];
			$newsname = $data[n_name];
?>
<center>
<table border="1" width="800" height="30" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
	<tr>
  	<td width="150" align="center">[<?php echo "$newsdate"?>]</td>
    <td><?php echo "$newsname"?>
	[<a href="newscontent.php? newsname=<? echo "$newsname"?>">��ϸ����</a>]	</td>
	</tr>
</table>
</center>
<?php
		}
	require_once "freeresult.php";//�ͷŽ����Ϣ
	require_once "dbclose.php"; // ����-�رշ������ݿ�
?> 

<!--***************************footer***************************-->
<?php include "data/footer.inc"?>
</body>
</html>
