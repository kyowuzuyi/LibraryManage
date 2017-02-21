<?php

session_start();

include ("db_connect.php");

$userID = $_SESSION['userID'];
$ISBN = $_GET['ISBN'];
$url = $_SESSION['url'];

$sql = "select * from history_loan where userID_loan=:userID";
$res = $pdo->prepare($sql);
$res->bindvalue(':userID',$userID);
$r = $res->execute();

if ($r === true){

	$row = $res->fetch(PDO::FETCH_ASSOC);
	$now = date("Y-m-d H:i:s");

	if($row === false || $row['ISBN_loan'] !== $ISBN){

		//=================//
		$sql = "select * from books where ISBN=:ISBN";
		$res = $pdo->prepare($sql);
		$res->bindvalue(':ISBN',$ISBN);
		$res->execute();
		$row = $res->fetch(PDO::FETCH_ASSOC);

		if($row['remained'] > 0){
			$remained = $row['remained']-1;
			$sql = "update books set remained=:remained where ISBN=:ISBN";
			$res = $pdo->prepare($sql);
			$res->bindValue(':remained',$remained);
			$res->bindValue(':ISBN',$ISBN);
			$res->execute();

			$sql = "select * from users where id_student=:userID";
			$res = $pdo->prepare($sql);
			$res->bindvalue(':userID',$userID);
			$res->execute();
			$row_user = $res->fetch(PDO::FETCH_ASSOC);

			$sql = "insert into history_loan(userID_loan,username_loan,ISBN_loan,time_loan,status) value(:userID,:username,:ISBN,:time,1)";
			$res = $pdo->prepare($sql);
			$res->bindvalue(':userID',$userID);
			$res->bindvalue(':username',$row_user['name_student']);
			$res->bindvalue(':ISBN',$ISBN);
			$res->bindvalue(':time',$now);
			$r = $res->execute();

			header("location: user_page.php?" . $url);

		}else{
			$_SESSION['book_loan_log'] = "この本を残りませんので、貸しができない。";
			header("location: user_page.php?" . $url);
		}
	}
}
