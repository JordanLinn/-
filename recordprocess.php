<?php 
	//��ȡÿ��ÿ����ķ���Ǯ��������
	$fileopen ="data/pulish.txt";
	$no=fopen($fileopen,"r");
	$pulish=fgets($no,10);
	fclose($no);
	//��ȡ����������
	$fileopen ="data/maxborrowday.txt";
	$no=fopen($fileopen,"r");
	$maxborrowday=fgets($no,10);
	fclose($no);
	//��ȡ����������
	$fileopen ="data/maxborrowtotalnum.txt";
	$no=fopen($fileopen,"r");
	$maxborrowtotalnum=fgets($no,10);
	fclose($no);
	//��ȡÿ����������
	$fileopen ="data/maxborrownum.txt";
	$no=fopen($fileopen,"r");
	$maxborrownum=fgets($no,10);
	fclose($no);
	
	//��ȡ���ݵĲ���
	$bookid = $_POST['bookid'];
	$readerid = $_POST['readerid'];
	$booknum = $_POST['booknum'];
	$operitetype = $_POST[operitetype];
	
	//echo "$bookid";
	//echo "$readerid";
	//echo "$operitetype";
/***************************************************************************************/
	//����
	if($operitetype=="borrow")
	{
		require_once "dbaccess.php";
		//�ж϶��ߵ��ܵĽ�����
		$query = "select * from record where u_id='".$readerid."'";
		$result = mysql_query($query);
		$rows = mysql_num_rows($result);
		if($rows==0)
		{
			if($booknum>$maxborrownum)
			{
				echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = recordmanage.php\">";
				echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
				echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
				echo "<center><font color=red>�㱾�β��ܽ�����ô��ͼ�飡</font></center>";
			}else
			{
			require_once "borrowprocess.php";
			//echo "called borrowprocess.php at place 1!";
			}
		}
		else
		{
			//�ж��Ѿ����ĵ���ͼ�����Ƿ񳬹�����
			$mbtn=0;
			for($i=0;$i<$rows;$i++)
			{
				mysql_data_seek($result,$i);
				$data = @mysql_fetch_array($result);
				$mbtn += $data[borrow_num];
			}
			if($mbtn >= $maxborrowtotalnum)
			{
				echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = recordmanage.php\">";
				echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
				echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
				echo "<center><font color=red>���ѽ��ĵ�ͼ���Ѵﵽ���ޣ�</font></center>";
			}
			else
			{
				//�ж϶��ߵ���Ľ�������
				$mbn=0;
				for($i=0;$i<$rows;$i++)
				{
					mysql_data_seek($result,$i);
					$data = @mysql_fetch_array($result);
					if($data[borrow_date]==date("Y-m-d"))
					{
						$mbn += $data[borrow_num];
					}
				}
				if($mbn >= $maxborrownum)
				{
					echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = recordmanage.php\">";
					echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
					echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
					echo "<center><font color=red>�������ĵ�ͼ���Ѵﵽ�涨��������</font></center>";
				}
				else
				{
					if(($mbn+$booknum)>$$maxborrownum)
					{
						echo "<META HTTP-EQUIV=\"Refresh\" Content=\"2;URL = recordmanage.php\">";
						echo "<meta http-equiv=\"Pragram\"content=\"no-cache\">";
						echo "<body style=\"font-family: Verdana; font-size: 10.5pt\">";
						echo "<center><font color=red>�㱾�β��ܽ�����ô��ͼ�飡</font></center>";
					}
					else
					{
						require_once "borrowprocess.php";
						//echo "called borrowprocess.php at place 2!";
					}
				}
			}
			
		}
		
		require_once "dbclose.php";
	}
	
/***************************************************************************************/	
	//����
	if($operitetype=="return")
	{
		require_once "dbaccess.php";
		//�ж��Ƿ���
		$query = "select * from record where b_id='".$bookid."' and u_id='".$readerid."'";
		$result = mysql_query($query);
		$rows = mysql_num_rows($result);
		if($rows!=0)
		{
			$rows=$rows-1;
		}
		mysql_data_seek($result,$rows);
		$data = @mysql_fetch_array($result);
		$borrowdate = $data[borrow_date];
		$borrownum = $data[borrow_num];
		//���ʱ���
		$query = "SELECT DATEDIFF('".date("Y-m-d")."','".$borrowdate."')";
		$result = mysql_query($query);
		$rows = mysql_num_rows($result);
		if($rows!=0)
		{
			$rows=$rows-1;
		}
		mysql_data_seek($result,$rows);
		$data = @mysql_fetch_array($result);
		
		$overborrowday = $data[0];
		//��������������
		if($overborrowday > $maxborrowday)
		{
			echo "�����Ѿ����ڣ��뻹�����ڷ��ú��ٻ��飡";
			require_once "pulishment.php";
		}
		else
		{
			require_once "returnprocess.php";
			echo "called returnprocess.php!";
		}
		require_once "dbclose.php";
	}
?>
