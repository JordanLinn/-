<?php

function makeuserid()
{
	//�����û�ID
	$user_record ="data/userno.txt";
	$no=fopen($user_record,"r");
	$num=fgets($no,10);
	$userid = "user0".$num;
	$num++;
	$no=fopen($user_record,"w");
	fputs($no,$num);
	fclose($no);
	return $userid;
}
	
	//���������û���Ϣ
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$birthdate = $year."-".$month."-".$day;
	$login = $_POST['loginname'];
	$password = $_POST['password'];
	$realname = $_POST['realname'];
	$sex = $_POST['sex'];
	$class = $_POST['class'];
	$department = $_POST['department'];
	$phonenum = $_POST['phonenum'];
	$mailbox = $_POST['mailbox'];
	//$birthdate = $_POST['birthdate'];
	$photoname ="pics/default.png"; 
	$usertype = $_POST['usertype'];
	$photourl ="pics/default.png"; 
/*	if($usertype!="reader")
	{
		echo "<center><font color=red> �������Ա��ϵ��</font></center>";
	}

	else
	{
*/		//�ж��û���Ϣ���������������
		require_once "dbaccess.php";
		$query = "select u_mailbox,u_type from user where u_login = '".$login."'";
		$result = mysql_query($query);
		$rows = mysql_num_rows($result);
		if($rows == 0)
		{
			$userid = makeuserid();
/*			//����ͼƬ	
			$upfilename = $_FILES['userfile']['name'];
			if($filename!="")
			{
				require_once "imgsave.php";
				if($photoname=="")
				{
					$photoname ="pics/default.png"; 
				}	
			}
*/
			$query = "insert into user values('".$userid."','".$realname."','".$sex."','".$class."','".$department."','".$phonenum."','".$mailbox."','".$birthdate."','".$login."','".$password."','".$usertype."','".$photourl."')";
			$result = mysql_query($query);
			//echo "$query";
			if (!$result) {
				die('Invalid query: ' . mysql_error());
			}
			else
			{
				$nextpage ="adduser.html";
				$successno =8;
				require_once "success.php";
				//echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = usermanage.php\">";
				//echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
				//echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
				//echo "<center><font color=red> �����û��ɹ���</font></center>";
			}
			
		}
		else
		{
			$nextpage ="adduser.html";
			$errorno =8;
			require_once "error.php";
			//echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = adduser.html\">";
			//echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
			//echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
			//echo "<center><font color=red> �õ�¼�û����Ѿ����ڣ�</font></center>";
		}
	/*	mysql_data_seek($result,$rows-1);
		$data = @mysql_fetch_array($result);
		$mailbox = $data[u_mailbox];
		$usertype = $data[u_type];
		echo "$mailbox"."<br>"."$usertype";
	*/	
		
		require_once "dbclose.php";
//	} 	
?>
