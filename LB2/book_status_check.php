<?php

include ('db_connect.php');

$userID = $_SESSION['userID'];

$sql = "select status from history_loan where ISBN_loan=:ISBN AND userID_loan=:userID ORDER BY id desc";
$res = $pdo->prepare($sql);
$res->bindvalue(':ISBN',$row['ISBN']);
$res->bindvalue(':userID',$userID);
$r = $res->execute();
$row_s = $res->fetch(PDO::FETCH_ASSOC);
if ($row_s !== false){
	$status_check = (int)$row_s['status'];
} else {
	$status_check = 0;
}