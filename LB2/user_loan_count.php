<?php
include ('db_connect.php');

$userID = $_SESSION['userID'];

$sql = "select * from history_loan where userID_loan=:userID";
$res = $pdo->prepare($sql);
$res->bindvalue(':userID',$userID);
$r = $res->execute();
$list = $res->fetchAll(PDO::FETCH_ASSOC);