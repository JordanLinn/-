<?php 
	$bookid = $_GET['bookid'];
	require_once "dbaccess.php";
	
	$query = "delete from book where b_id='".$bookid."'";
	$result = mysql_query($query);
	//echo "$query";
	if (!$result) {
    	die('Invalid query: ' . mysql_error());
	}else
	{
		$num++;
		echo "<center>ɾ��ͼ��ɹ���</center>";
	}
	//require_once "freeresult.php";
	require_once "dbclose.php";
?>
