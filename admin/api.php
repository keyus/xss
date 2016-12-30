<?php
require '../config.php';
$mysqli= mysql_con();

$id=$_POST['id'];

//change read_state;
if($id && $_POST['change']=='read'){
    $result=$mysqli->query("update cookie set read_state=1 where id=".$id);
    if($result){
        echo json_encode(['success'=>true]);
    }else{
        echo json_encode(['fail'=>true]);
    }
}

//delete data;
if($id && $_POST['delete']=='yes'){
    $result=$mysqli->query("delete from cookie where id=".$id);
    if($result){
        echo json_encode(['success'=>true]);
    }else{
        echo json_encode(['fail'=>true]);
    }
}
$mysqli->close();
?>
