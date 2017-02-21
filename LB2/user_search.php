<?php

include ('db_connect.php');


if(!isset($_GET['user'])){

}else{

	unset($_SESSION['book_search_log']);

	$user = $_GET['user']; 		if($user == ""){ $user = "　　　";}


	$sql = "select * from history_loan where username_loan LIKE :user";

	$res = $pdo->prepare($sql);
	$res->bindValue(":user", '%' . $user . '%');
	$r = $res->execute();

	$list = $res->fetchAll(PDO::FETCH_ASSOC);


}