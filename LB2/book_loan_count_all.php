<?php

include ('db_connect.php');

$sql = "select * from history_loan";
$res = $pdo->prepare($sql);
$r = $res->execute();
$list = $res->fetchAll(PDO::FETCH_ASSOC);