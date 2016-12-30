<?php
/**
 * 认证页面
 */
require '../config.php';

$us=$_POST['us'];
$pd=$_POST['pd'];
if($us==USER && $pd ==PASSWORD){
    session_start();
    $_SESSION['user']=USER;
    $_SESSION['password']=PASSWORD;
    echo json_encode(['success' => true]);
}else{
    echo json_encode(['fail' => true]);
}