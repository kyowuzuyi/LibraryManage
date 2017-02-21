<?php

include("db_connect.php");

$sql = "select * from manager";
$res = $pdo->prepare($sql);
$r = $res->execute();
$list = $res->fetchAll(PDO::FETCH_ASSOC);

