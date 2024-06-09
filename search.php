<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="favicon.ico" />
<title>����ͼ��</title>
<link href="lms.css" rel="stylesheet" type="text/css">
<script>
<!--
	function validateform()
	{
		if(document.booksearch.bookname.value == "" && document.booksearch.author.value == "" && document.booksearch.keyword.value == "")
		{
			window.alert ("��������Ҫ��������Ϣ!")
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
  	<img src="pics/position.png" alt="position" width="16" height="16" align="absmiddle">&nbsp;���λ��	</td>
    <td><img src="pics/rightdir.png" alt="rightdir" width="16" height="16" align="absmiddle">[&gt;<a href="search.php">����ͼ��</a>&lt;]</td>
	</tr>
</table>
</center>

<center>
<table border="1" width="800" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
    <tr>
	<td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="pics/booksearch.png" alt="����ͼ��" width="50" height="50" align="absmiddle">
	<strong><font color="#66CCFF" size="10">����ͼ��</font></strong>	</td>
</table>
</center>
<!--***************************************************************-->
<center>
 <table border="0" width="800" cellspacing="0" cellpadding="0">
  	<tr>
	<td width="100%">
<form action="searchprocess.php" method="post" name="booksearch" onSubmit="return validateform( this.form )">
<table border="1" width="800" cellspacing="0" cellpadding="0" bgcolor="#E4E4E4" bordercolorlight="#C2C2C2" bordercolordark="#FFFFFF">
    <tr height="30">
	<td>����:<input type="text" name="bookname" size="20"></td>
	<td>����:<input type="text" name="author" size="30"></td>
	<td>�ؼ���:<input type="text" name="keyword" size="30"></td>
	<td><input type="submit" value=" �� �� "></td>
	</tr>
	<!--***************************footer***************************-->
	<?php include "data/footer.inc"?>
</table>
</form>
	</td>
	</tr>
</table>
</center>
</body>
</html>
