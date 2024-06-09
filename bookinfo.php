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
  	<img src="pics/position.png" alt="position" width="16" height="16" align="absmiddle">&nbsp;���λ��</td>
    <td><img src="pics/rightdir.png" alt="rightdir" width="16" height="16" align="absmiddle">[&gt;<a href="bookmanage.php">ͼ�����</a>:ͼ����Ϣ&lt;]</td>
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
		if($data[b_price]-floor($data[b_price])==0)
		{
			$tail=".00";
		}else
		{
			$tail="0";
		}
?>	
<center>
<table border="1" width="800" height="30" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
	<tr>
  	<td width="234" rowspan="12" align="center"><img src="pics/book.png" alt="ͼ��" width="128" height="155"></td>
    <td>��ţ�<?php echo "$data[b_id]"?></td>
	</tr>
	<tr>
  	<td>������<?php echo "$data[b_mname]"?></td>
	</tr>
	<tr>
  	<td>������<?php echo "$data[b_bname]"?></td>
	</tr>
	<tr>
  	<td>��Σ�<?php echo "$data[b_version]"?></td>
	</tr><tr>
  	<td>���ߣ�<?php echo "$data[b_author]"?></td>
	</tr>
	<tr>
  	<td>�����磺<?php echo "$data[b_press]"?></td>
	</tr>
	<tr>
  	<td>ͼ��۸�<?php echo "��$data[b_price]$tail"?></td>
	</tr>
	<tr>
  	<td>�������ڣ�<?php echo "$data[b_pdate]"?></td>
	</tr>
	<tr>
  	<td>������ڣ�<?php echo "$data[b_indate]"?></td>
	</tr>
	<tr>
  	<td>�ڹ�������<?php echo "$data[b_num]"?></td>
	</tr>
	<tr>
  	<td>ͼ�����<?php echo "$data[b_type]"?></td>
	</tr>
	<tr>
  	<td>��飺<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "$data[b_intro]"?></td>
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
