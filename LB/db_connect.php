<?php

try {
	$pdo = new PDO('mysql:dbname=lb;host=127.0.0.1','root','');
	$pdo->exec("set names utf8");
} catch (PDOException $e) {
	exit('error'.$e->getMessage());
}

?>