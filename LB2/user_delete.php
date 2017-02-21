<?php

session_start();
include ("db_connect.php");

$userID = $_POST["userID"];

$sql = "select * from users where id_student=:userID";
$res = $pdo->prepare($sql);
$res->bindValue(":userID",$userID);
$r = $res->execute();

if($r === true){
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if ($row === false){
        $_SESSION['user_delete_log'] = "このユーザーがいない。";
        header("Location: manager_user_page.php");
    }else{
        $sql = "delete from users where id_student=:userID";
        $res = $pdo->prepare($sql);
        $res->bindValue(":userID",$userID);
        $r = $res->execute();
        if ($r === true) {
            $_SESSION['user_delete_log'] = "削除しました。";
            header("Location: manager_user_page.php");
        }else{
            $_SESSION['user_delete_log'] = "error";
            header("Location: manager_user_page.php");
        }
    }
}else{
    $_SESSION['user_delete_log'] = "error";
    header("Location: manager_user_page.php");
}