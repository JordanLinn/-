<?php 
	$userid = $_GET['userid'];
	require_once "dbaccess.php";
	
	$query = "delete from user where u_id='".$userid."'";
	$result = mysql_query($query);
	//echo "$query";
	if (!$result) {
    	die('Invalid query: ' . mysql_error());
	}else
	{
		$num++;
		echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = usermanage.php\">";
		echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
		echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
		echo "<center>ɾ���û��ɹ���</center>";
	}
	//require_once "freeresult.php";
	require_once "dbclose.php";
?>
