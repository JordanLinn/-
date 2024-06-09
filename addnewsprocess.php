<?php
require_once "dbaccess.php";
$newsname = $_POST['newsname'];
$newsdate = date("Y-m-d");
$newstype = $_POST['newstype'];
$newscontent = $_POST['newscontent'];

$query = "insert into news(n_name,n_type,n_content,n_date) values('".$newsname."','".$newstype."','".$newscontent."','".$newsdate."')";
$result = mysql_query($query);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}else
{
	echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = index.php\">";
	echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
	echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
	echo "<center><font color=red>�������ųɹ���</font></center>";
}	

require_once "dbclose.php";
?>
