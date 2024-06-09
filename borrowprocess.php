<?php
	//���ӽ����¼
	$query = "insert into record values('".$readerid."','".$bookid."','".date("Y-m-d")."','".$booknum."')";
	
	$result = mysql_query($query);
	if (!$result) {
    	die('Invalid query: ' . mysql_error());
	}
	else
	{
		echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = recordmanage.php\">";
		echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
		echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
		echo "<center><font color=red>����ɹ�!</font></center>";
	}

?>
