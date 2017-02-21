<?php

try {
$pdo = new PDO('mysql:dbname=LibraryManage;host=127.0.0.1','LibraryManage','LibraryManage');
$pdo->exec("set names utf8");
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

?>