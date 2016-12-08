<?php
require '../config.php';

$us=$_POST['us'];
$pd=$_POST['pd'];
if($us==USER && $pd ==PASSWORD){
    session_start();
    $_SESSION['user']='admin';
    $_SESSION['password']='tu!@#';
    echo json_encode(['success' => true]);
}else{
    echo json_encode(['fail' => true]);
}