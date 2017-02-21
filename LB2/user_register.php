<?php

session_start();

include("db_connect.php");

$userName = $_POST["userName"];
$userID = $_POST["userID"];
$userEmail = $_POST["userEmail"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

$sql = "select * from users where ID_student=:userID";
$res = $pdo->prepare($sql);
$res->bindValue(':userID',$userID);
$r = $res->execute();

if($r === true){

    $sql2 = "select * from manager where accountID_manager=:userID";
    $res2 = $pdo->prepare($sql2);
    $res2->bindValue(':userID',$userID);
    $r2 = $res2->execute();
    $row2 = $res2->fetch(PDO::FETCH_ASSOC);

    if($row2 === false){

        $row = $res->fetch(PDO::FETCH_ASSOC);

        if($row === false){
            if($userName != "" && $userID != "" && $password != "" && $password == $password2) {
                $sql = "insert into users(name_student,id_student,password_student,email_student)value(:userName,:userID,:password,:userEmail)";
                $res = $pdo->prepare($sql);
                $res->bindValue(':userName', $userName);
                $res->bindValue(':userID', $userID);
                $res->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
                $res->bindValue(':userEmail', $userEmail);
                $r = $res->execute();
                if($r === true){
                    $_SESSION['user_register_log'] = "登録しました。";
                    header("Location: manager_user_page.php");
                }else{
                    $_SESSION['user_register_log'] = "error1";
                    header("Location: manager_user_page.php");
                }
            }else{
                $_SESSION['user_register_log'] = "入力間違いましたので、もう一度入力してください。";
                header("Location: manager_user_page.php");
            }
        }else{
           $_SESSION['user_register_log'] = "このIDは存在しています";
            header("Location: manager_user_page.php");
        }
    }else{
        $_SESSION['user_register_log'] = "このIDは存在しています";
            header("Location: manager_user_page.php");
    }
}else{
    $_SESSION['user_register_log'] = "error2";
    header("Location: manager_user_page.php");
}
