<?php
// Connecting, selecting database
$link = mysql_connect('localhost', 'lmsadmin', '123456')
    or die('Could not connect: ' . mysql_error());
mysql_select_db('lms') or die('Could not select database');
?> 
