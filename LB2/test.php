<?php

session_start();

include('db_connect.php');

$userID = $_POST['userID'];
$userPassword = $_POST['userPassword'];

$_SESSION['userID'] = $userID;

$sql = "insert into manager(name_manager,accountID_manager,password_manager,flag_manager) value('test_manager',:userID,:userPassword,0)";
$res = $pdo->prepare($sql);
$res->bindValue(':userID',$userID);
$res->bindValue(':userPassword',password_hash($userPassword,PASSWORD_DEFAULT));
$r = $res->execute();
