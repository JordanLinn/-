<?php 

	//����ύ��Ϣ
	$bookid = $_POST['bookid'];
	$mainname = $_POST['mainname'];
	//echo "$mainname";
	$byname = $_POST['byname'];
	$bookversion = $_POST['bookversion'];
	if($bookversion =="")
	{
	$bookversion =1;
	}
	$author = $_POST['author'];
	if($author =="")
	{
	$author ="unknown";
	}
	$press = $_POST['press'];
	if($press =="")
	{
	$press ="unknown";
	}
	$bookprice = $_POST['bookprice'];
	//echo "$bookprice";
	$type = $_POST['type'];
	if($type =="")
	{
	$type ="unknown";
	}
	$booknum = $_POST['booknum'];
	$bookintro = $_POST['bookintro'];
	$pressdate = $_POST['pressdate'];
	//���ú����������ݿ�
	require_once "dbaccess.php";
	$query1 = "select b_id,b_intro from book where b_id='".$bookid."'";
	$result = mysql_query($query1);
	$rows = mysql_num_rows($result);
	if($rows==0)
	{
		$rows=$rows;
	}
	else
	{
		$rows=$rows-1; 
	}
	mysql_data_seek($result,$rows);
	$data = @mysql_fetch_array($result);
	if($bookintro =="")
	{
		$bookintro =$data[b_intro];
	}
	$bookid = $data[b_id];
	
	$query = "update book set b_num='".$booknum."',b_mname='".$mainname."',b_bname='".$byname."',b_version='".$bookversion."',b_author='".$author."',b_pdate='".$pressdate."',b_press='".$press."',b_price=".$bookprice.",b_num='".$booknum."',b_intro='".$bookintro."' where b_id ='".$bookid."'";
	//echo "$query";
	$result = mysql_query($query);
	if (!$result) {
    	die('Invalid query: ' . mysql_error());
	}else
	{
		echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = bookmanage.php\">";
		echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
		echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
		echo "<center><font color=red>�޸�ͼ��ɹ���</font></center>";
	}	
	require_once "dbclose.php";
	
	
?>
