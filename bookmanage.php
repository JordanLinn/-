<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "bookadmin";
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
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="favicon.ico" />
<title>ͼ�����</title>
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
    <td><img src="pics/rightdir.png" alt="rightdir" width="16" height="16" align="absmiddle">[&gt;<a href="bookmanage.php">ͼ�����</a>&lt;]</td>
	</tr>
</table>
</center>

<!--************************************************************-->
<div align="center">
<center>
	<?php
		require_once "dbaccess.php";
		$query = "select * from book";
		$result = mysql_query($query);
		$rows_total = @mysql_num_rows($result);// ����������
	
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
		$sql = "select * from book ORDER BY b_indate DESC limit $start_num,$page_num";
		$result = mysql_query($sql);
		$rows = @mysql_num_rows($result);
	?>
<center>
<table border="1" width="800" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
    <tr>
	<td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="pics/book.png" alt="ͼ�����" width="50" height="50" align="absmiddle">
	<strong><font color="#66CCFF" size="10">ͼ�����</font></strong>	</td>
	</tr>
</table>
</center>	
	
<table border="1" width="800" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
    <tr valign="bottom">
	<td width="140">
	&nbsp;&nbsp;
	<img src="pics/bookadd.png" alt="��������" width="41" height="64">
	[<a href="addbook.php" name="add">��������</a>]
	</td>
	<td>
	<div align="left">
	����
	<font color="#FF6600"><?php echo "$rows_total"?></font>
	����¼[ÿҳ10��]
	</div>
	</td>
	</tr>
</table>
<center>
</div>

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
	<td width="5%"><div align="center">
	<a href="bookmodify.php?bookid=<? echo "$bookid"?>">
	<img src="pics/bookmodify.png" alt="�޸�" border="0" width="64" height="64"></a></div></td>
	<td width="5%"><div align="center">
	<a href="bookdelete.php?bookid=<? echo "$bookid"?>">
	<img src="pics/bookdelete.png" alt="ɾ��" border="0" width="64" height="64"></a></div></td>
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
<!--***************************footer***************************-->
<?php include "data/footer.inc"?>
</body>
</html>
