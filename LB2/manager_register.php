<?php

session_start();

include("db_connect.php");

$managerName = $_POST["managerName"];
$managerID = $_POST["managerID"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

$sql = "select * from manager where accountID_manager=:managerID";
$res = $pdo->prepare($sql);
$res->bindValue(':managerID',$managerID);
$r = $res->execute();

if($r === true){
    $row = $res->fetch(PDO::FETCH_ASSOC);

    if($row === false){
        if($managerName != "" && $managerID != "" && $password != "" && $password == $password2) {
            $sql = "insert into manager(name_manager,accountID_manager,password_manager,flag_manager) value(:managerName,:managerID,:password,0)";
            $res = $pdo->prepare($sql);
            $res->bindValue(':managerName', $managerName);
            $res->bindValue(':managerID', $managerID);
            $res->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
            $r = $res->execute();
            if($r === true){
                $_SESSION['register_log'] = "登録しました。";
                header("Location: top_manager_page.php");
            }else{
                $_SESSION['register_log'] = "error";
                header("Location: top_manager_page.php");
            }
        }else{
            $_SESSION['register_log'] = "入力間違いましたので、もう一度入力してください。";
            header("Location: top_manager_page.php");
        }
    }else{
        $_SESSION['register_log'] = "このIDは存在しています";
        header("Location: top_manager_page.php");
    }
}else{
    $_SESSION['register_log'] = "error";
    header("Location: top_manager_page.php");
}
