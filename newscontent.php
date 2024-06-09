<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="favicon.ico" />
<title>������Ϣ</title>
<link href="lms.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--***************************header***************************-->
<?php include "data/header.inc"?>
<!--***************************main**************************-->
<?php 
require_once "dbaccess.php";

$newsname = $_GET['newsname'];
$query = "SELECT n_content FROM news WHERE n_name='".$newsname."'";
$result = mysql_query($query);
$rows = mysql_num_rows($result);
mysql_data_seek($result,$rows-1);
$data = @mysql_fetch_array($result);
$newscontent = $data[n_content];

require_once "freeresult.php";//�ͷŽ����Ϣ
require_once "dbclose.php"; // ����-�رշ������ݿ�
?>
<center>
<table border="1" width="800" height="30" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
	<tr>
  	<td width="234" align="center">
  	<img src="pics/position.png" alt="position" width="16" height="16" align="absmiddle">&nbsp;���λ��	</td>
    <td><img src="pics/rightdir.png" alt="rightdir" width="16" height="16" align="absmiddle">[&gt;����:<?php echo "$newsname"?>&lt;]</td>
	</tr>
</table>

<table border="1" width="800" height="30" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
	<tr>
    <td align="center"><font color="#FF6600" size="5">
	<?php echo "$newsname"?>
	<font>
	</td>
	</tr>
	<tr>
    <td><h3>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo "$newscontent"?></h3>
	</td>
	</tr>
</table>
</center>
<!--***************************footer***************************-->
<?php include "data/footer.inc"?>
</body>
</html>
