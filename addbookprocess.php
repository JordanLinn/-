<?php 
	//�������ͼ��ĺ���
	function insertbook($overloadtype)
	{
		global $bookid,$mainname,$byname,$bookversion,$author,$press,$bookprice,$type,$pressdate,$indate,$booknum,$bookintro,$num;
		if($overloadtype)
		{
			$query = "insert into book(b_id,b_mname,b_bname,b_version,b_author,b_press,b_price,b_type,b_pdate,b_indate,b_num,b_intro)";
			$query .= "values('".$bookid."','".$mainname."','".$byname."','".$bookversion."','".$author."','".$press."','".$bookprice."','";
			$query .=$type."','".$pressdate."','".$indate."','".$booknum."','".$bookintro."')";
		}else
		{
			$query = "update book set b_num='".$booknum."' where b_id ='".$bookid."'";
		}
		$result = mysql_query($query);
		if (!$result) {
    	die('Invalid query: ' . mysql_error());
		}else
		{
			$num++;
			$nextpage ="bookmanage.php";
			$successno =4;
			require_once "success.php";
			//echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = bookmanage.php\">";
			//echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
			//echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
			//echo "<center><font color=red>����ͼ��ɹ���</font></center>";
		}	
	}
	//��ͼ���¼��
	$idnum ="data/bookidnum.txt";
	$no=fopen($idnum,"r");
	$num=fgets($no,10);
	
	//����ύ��Ϣ
	$bookid = "isbn0";
	$bookid .= $num;
	$mainname = $_POST['mainname'];
	$byname = $_POST['byname'];
	if($byname =="")
	{
	$byname ="unknown";
	}
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
	$type = $_POST['type'];
	if($type =="")
	{
	$type ="unknown";
	}
	$booknum = $_POST['booknum'];
	$bookintro = $_POST['bookintro'];
	if($bookintro =="")
	{
	$bookintro ="unknown";
	}
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$pressdate = $year."-".$month."-".$day;
	//$pressdate = $_POST['pressdate'];
	
	$indate = date('Y-m-d');
	//���ú����������ݿ�
	require_once "dbaccess.php";
	$query1 = "select b_id,b_mname,b_bname,b_num from book where b_mname='".$mainname."' and b_bname='".$byname."'";
	$result = mysql_query($query1);
	$rows = mysql_num_rows($result);
	if($rows==0)
	{
		$rows=$rows;
		$insertnew = true;
	}
	else
	{
		$rows=$rows-1;
		$updatenew = false; 
		mysql_data_seek($result,$rows);
		$data = @mysql_fetch_array($result);
		$bookid = $data[b_id];
		$booknum = $booknum + $data[b_num];
	}
	insertbook($insertnew);
	require_once "freeresult.php";
	require_once "dbclose.php";
	
	
	$no=fopen($idnum,"w");
	fputs($no,$num);
	fclose($no);
?>
