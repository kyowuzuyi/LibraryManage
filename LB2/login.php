<?php

session_start();

include('db_connect.php');

$userID = $_POST['userID'];
$userPassword = $_POST['userPassword'];

$_SESSION['userID'] = $userID;

$sql = "select * from manager where accountID_manager=:userID";
$res = $pdo->prepare($sql);
$res->bindValue(':userID',$userID);
$r = $res->execute();

if($r === true){
	
	$row = $res->fetch(PDO::FETCH_ASSOC);
	
	if($row === false){ // student table
		$sql = "select * from users where id_student =:userID";
		$res = $pdo->prepare($sql);
		$res->bindValue(':userID',$userID);
		$r = $res->execute();

		$row = $res->fetch(PDO::FETCH_ASSOC);
		
		if($row !== NULL){

			$pw_log = password_verify($userPassword, $row['password_student']);
			
			if($pw_log === true){	
				header("Location: user_page.php");
			}else{
				$_SESSION['login_log'] = "IDまたはパスワードを間違いました。";
				header("Location: index.php");
			}
		}else{
			$_SESSION['login_log'] = "IDまたはパスワードを間違いました。";
			header("Location: index.php");
		}		
	}else{ //manager table
		
		$pw_log = password_verify($userPassword, $row['password_manager']);
		
		if($pw_log === true){

			if($row['flag_manager'] === "1"){
				header("Location: top_manager_page.php");
			}else{
				$_SESSION['once'] = 1;
				header("Location: manager_page.php");
			}
		}else{
			$_SESSION['login_log'] = "IDまたはパスワードを間違いました。";
			header("Location: index.php");
		}
	}	
}else{
	header("Location: index.php");
}


?>