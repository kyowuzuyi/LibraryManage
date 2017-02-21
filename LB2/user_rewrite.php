<?php

session_start();

include ("db_connect.php");

$ID_student = $_POST['ID_student'];
$NewName_student = $_POST['NewName_student'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if($ID_student !== "" && $NewName_student !== "" && $password !== "" && $password === $password2){
	$sql = "update users set name_student=:NewName_student, password_student=:password where id_student=:ID_student";

	$res = $pdo->prepare($sql);
	$res->bindValue(':NewName_student',$NewName_student);
	$res->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
	$res->bindValue(':ID_student',$ID_student);
	$r = $res->execute();

	if($r === true){
		$_SESSION['user_rewrite_log'] = "編集しました。";
        header("Location: manager_user_page.php");
	}else{
		$_SESSION['user_rewrite_log'] = "失敗しました。";
        header("Location: manager_user_page.php");
	}
}else{
	$_SESSION['user_rewrite_log'] = "入力エーラ";
        header("Location: manager_user_page.php");
}