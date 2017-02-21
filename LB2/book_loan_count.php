<?php

include ('db_connect.php');

if(!isset($_GET['userID']) && !isset($_GET['username']) && !isset($_GET['ISBN'])){

	$_SESSION['user_loan_search_log'] = "検索情報を入力してください";

}else{

	unset($_SESSION['user_loan_search_log']);

	$userID = $_GET['userID']; 		if($userID === ""){$userID = "!@#$%^&*(";}
	$username = $_GET['username'];	if($username === ""){$username = "!@#$%^&*(";}
	$ISBN = $_GET['isbn'];			if($ISBN === ""){$ISBN = "!@#$%^&*(";}

	$sql = "select * from history_loan where userID_loan LIKE :userID OR username_loan LIKE :username OR ISBN_loan LIKE :isbn";
	$res = $pdo->prepare($sql);
	$res->bindValue(":userID", '%' . $userID . '%');
	$res->bindValue(":username", '%' . $username . '%');
	$res->bindValue(':isbn', '%' . $ISBN . '%');
	$r = $res->execute();

	$list = $res->fetchAll(PDO::FETCH_ASSOC);

	if ($list == NULL) {
		$_SESSION['user_loan_search_log'] = "見つかりませんでした。";
	}else{
		unset($_SESSION['user_loan_search_log']);
	}

}
