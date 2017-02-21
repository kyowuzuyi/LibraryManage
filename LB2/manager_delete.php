<?php

session_start();
include ("db_connect.php");

$managerID = $_POST["managerID"];

$sql = "select * from manager where accountID_manager=:managerID";
$res = $pdo->prepare($sql);
$res->bindValue(":managerID",$managerID);
$r = $res->execute();

if($r === true){
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if ($row['flag_manager'] === "1"){
        $_SESSION['delete_log'] = "top管理者を削除できない。";
        header("Location: top_manager_page.php");
    }else{
        $sql = "delete from manager where accountID_manager=:managerID";
        $res = $pdo->prepare($sql);
        $res->bindValue(":managerID",$managerID);
        $r = $res->execute();
        if ($r === true) {
            $_SESSION['delete_log'] = "完了しました。";
            header("Location: top_manager_page.php");
        }else{
            $_SESSION['delete_log'] = "error";
            header("Location: top_manager_page.php");
        }
    }
}else{
    echo "error";
    header("Location: top_manager_page.php");
}