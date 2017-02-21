<?php

session_start();
include ("db_connect.php");

$isbn = $_POST["isbn"];

$sql = "select * from books where ISBN=:isbn";
$res = $pdo->prepare($sql);
$res->bindValue(":isbn",$isbn);
$r = $res->execute();

if($r === true){
    $row = $res->fetch(PDO::FETCH_ASSOC);
    if ($row === false){
        $_SESSION['book_delete_log'] = "この本がない。";
        header("Location: manager_books_page.php");
    }else{
        $sql = "delete from books where ISBN=:isbn";
        $res = $pdo->prepare($sql);
        $res->bindValue(":isbn",$isbn);
        $r = $res->execute();
        if ($r === true) {
            $_SESSION['book_delete_log'] = "削除しました。";
            header("Location: manager_books_page.php");
        }else{
            $_SESSION['book_delete_log'] = "error1";
            header("Location: manager_books_page.php");
        }
    }
}else{
    $_SESSION['book_delete_log'] = "error2";
    header("Location: manager_books_page.php");
}