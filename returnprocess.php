<?php
	if($booknum<$borrownum)
	{
		//�޸Ľ����¼
		$borrownum = $borrownum - $booknum;
		$query = "update record set borrow_num='".$borrownum."' where u_id='".$readerid."' and b_id='".$bookid."'";
	}
	else
	{
		//ɾ�������¼
		$query = "delete from record where u_id='".$readerid."' and b_id='".$bookid."'";
	}
	
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	else
	{
		echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = recordmanage.php\">";
		echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
		echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
		echo "<center><font color=red>����ɹ���</font></center>";
		
	}

?>
