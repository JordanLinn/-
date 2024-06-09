<?php
function getpicsave($filename)
{
	//�洢ͼƬ��·��������·��c:(...)
	$uploaddir = '/Program Files/Apache Software Foundation/Apache2.2/htdocs/PHP_Design/libraryManageSystem/pics/userimg';
	//��ͼƬ��¼��
	$pic_record ="data/picno.txt";
	$no=fopen($pic_record,"r");
	$num=fgets($no,10);
	//����ύ���ļ���
	$filetype = substr($filename,-3);
	//�ж�ͼƬ����
	if($filetype != "gif")
	{
		$picurlname = "";
	}
	else
	{
		//�洢ͼƬ·�������ݿ�
		$picurlname = "pics/userimg/Icon0".$num.".gif";
		$uploadfile = $uploaddir . basename($picurlname);
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)
	
		//ͼƬ����1
		$num++;
	}
	//дͼƬ�������ر��ļ�
	$no=fopen($pic_record,"w");
	fputs($no,$num);
	fclose($no);
	
	return $picurlname;
}
	$photoname = getpicsave($upfilename);
?>
