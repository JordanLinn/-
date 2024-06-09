<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="favicon.ico" />
<title>�������</title>
<link href="lms.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include "data/header.inc" ?>
<center>
<?php
	$bookname = $_POST['bookname'];
	$author = $_POST['author'];
	$keyword = $_POST['keyword'];
	
	require_once "dbaccess.php";
		
	$querywhere = " where 1='1'";
	if($bookname != ""){ $querywhere = $querywhere."and b_mname like'%".$bookname."%'"; }
	if($author != ""){$querywhere = $querywhere."and b_author like'%".$author."%'";}
	if($keyword != ""){$querywhere = $querywhere."and b_intro like'%".$keyword."%'";}
	$query = "select * from book".$querywhere;
	//echo "$query";
	$result = mysql_query($query);
	$rows_total = @mysql_num_rows($result);
	//echo "$rows_total";
	$page_no = $_GET['page_no'];
		
		$page_num = 10;//ÿҳ��¼��
		$page_total = floor($rows_total/10);//������ҳ��
		if($rows_total%10!=0)
		{
			$page_total=$page_total+1;
		}
		if($page_no>$page_total)
		{
			$page_no = $page_total;
		}
		if(!$page_no)//page_no��
		{
			$page_no = 1;
		}
		$start_num = $page_num * ($page_no-1);//ҳ��
		$sql = $query." limit $start_num,$page_num";
		//echo "$sql";
		$result = mysql_query($sql);
		$rows = @mysql_num_rows($result);
		//echo "$rows";
?>
<table border="1" width="800" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
    <tr>
	<td>
	<div align="center">
	���������ļ�¼��
	<font color="#FF6600"><?php echo "$rows_total"?></font>
	��
	</div>
	</td>
	</tr>
</table>
</center>

<div align="center">
<table border="1" width="800" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
    <tr>
	<td width="15%"><div align="center">����</div></td>
	<td width="20%"><div align="center">����</div></td>
	<td width="20%"><div align="center">������</div></td>
	<td width="15%"><div align="center">����</div></td>
	<td width="15%"><div align="center">��������</div></td>
	<td width="15%" colspan="3"><div align="center">����</div></td>
	</tr>
	<?php
		for($i=0;$i<$rows;$i++)
		{
			mysql_data_seek($result,$i);
			$data = @mysql_fetch_array($result);
			$bookname = $data[b_mname];
			$bookauthor = $data[b_author];
			$bookpress = $data[b_press];
			$booktype = $data[b_type];
			$indate = $data[b_indate];
			$bookid = $data[b_id];
	?>
	
	<tr>
	<td width="15%"><div align="center"><?php echo "$bookname" ?></div></td>
	<td width="20%"><div align="center"><?php echo "$bookauthor" ?></div></td>
	<td width="20%"><div align="center"><?php echo "$bookpress" ?></div></td>
	<td width="15%"><div align="center"><?php echo "$booktype" ?></div></td>
	<td width="15%"><div align="center"><?php echo "$indate" ?></div></td>
	
	<td width="5%"><div align="center">
	<a href="bookinfo.php?bookid=<? echo "$bookid"?>">
	<img src="pics/bookview.png" alt="��ʾ��ϸ��Ϣ" border="0" width="64" height="64"></a></div></td>
	</tr>
	<?php
		}
		require_once "dbclose.php";
	?>
</table>
<table border="1" width="800" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
<tr>
<td align="center">
<?php
echo "<a href='bookmanage.php?page_no=1'>��ҳ</a>";
echo "&nbsp;";
echo "<a href='bookmanage.php?page_no=".($page_no-1)."'>��һҳ</a>";
echo "&nbsp;";
echo "��".$page_no."ҳ [��".$page_total."ҳ]";
echo "&nbsp;";
echo "<a href='bookmanage.php?page_no=".($page_no+1)."'>��һҳ</a>";
echo "&nbsp;";
echo "<a href='bookmanage.php?page_no=".$page_total."'>βҳ</a>";
?>
</td>
</tr>
</table>
</div>
</table>
</div>
<?php include "data/footer.inc" ?>
</body>
</html>
