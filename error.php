<html>
<head>
<link rel="shortcut icon" href="favicon.ico" />
<title>����</title>
</head>
<body>
<br><br><br><br><br>
<center>
<img src="pics/error.png" alt="error" width="128" height="128">
</center>
<center>
<strong>
<font size="+2" color="#EE0000">
<!--*******************error*******************-->
error
<br>
<?php
if($nextpage)
{
	echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = ".$nextpage."\">";
	echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
	 
	if($errorno==1){	echo "���벻��ȷ!";}
	if($errorno==2){	echo "�û���������!";}
	if($errorno==3){	echo "�û����Ͳ�ƥ��!";}
	if($errorno==4){	echo "�㱾�β��ܽ�����ô��ͼ�飡";}
	if($errorno==5){	echo "���ѽ��ĵ�ͼ���Ѵﵽ���ޣ�";}
	
	if($errorno==6){	echo "�������ĵ�ͼ���Ѵﵽ�涨��������";}
	if($errorno==7){	echo "�㱾�β��ܽ�����ô��ͼ�飡";}
	if($errorno==8){	echo "�õ�¼�û����Ѿ�����!";}
	if($errorno==9){	echo "��û�з��ʵ�Ȩ��!";}
	if($errorno==10){	echo "���ȵ�¼!";}
}	
else
{
	echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = index.php\">";
	echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
	echo "�û������벻��ȷ��";
	echo "<br><br>���ȵ�¼!";
}
?>

</font>
</strong>
</center>
</body>
</html>
