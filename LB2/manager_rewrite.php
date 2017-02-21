<?php

session_start();

include ("db_connect.php");

$managerID = $_POST['managerID'];
$managerNewName = $_POST['managerNewName'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if($managerID !== "" && $managerNewName !== "" && $password !== "" && $password === $password2){
	$sql = "update manager set name_manager=:managerNewName, password_manager=:password where accountID_manager=:managerID";

	$res = $pdo->prepare($sql);
	$res->bindValue(':managerNewName',$managerNewName);
	$res->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
	$res->bindValue(':managerID',$managerID);
	$r = $res->execute();

	if($r === true){
		$_SESSION['manager_rewrite_log'] = "編集しました。";
        header("Location: top_manager_page.php");
	}else{
		$_SESSION['manager_rewrite_log'] = "失敗しました。";
        header("Location: top_manager_page.php");
	}
}else{
	$_SESSION['manager_rewrite_log'] = "入力エーラ";
        header("Location: top_manager_page.php");
}