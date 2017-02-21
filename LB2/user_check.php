<?php

session_start();

include ('db_connect.php');

$userID = $_SESSION['userID'];

$sql1 = "select * from manager where accountID_manager=:userID";
$res1 = $pdo->prepare($sql1);
$res1->bindValue(':userID',$userID);
$r1 = $res1->execute();
$row1 = $res1->fetch(PDO::FETCH_ASSOC);

$sql2 = "select * from user where id_student=:userID";
$res2 = $pdo->prepare($sql2);
$res2->bindValue(':userID',$userID);
$r2 = $res2->execute();
$row2 = $res2->fetch(PDO::FETCH_ASSOC);

var_dump($row1);

var_dump($row2);

if($row1 !== false){
    if($row1['flag_manager'] === 1){
        $_SESSION['user_check'] = "1";
    }else{
        $_SESSION['user_check'] = "2";
    }
}else if($row2 !== false){
    $_SESSION['user_check'] = "3";
}else{
    $_SESSION['user_check'] = "out";
}