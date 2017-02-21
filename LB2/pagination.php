<?php

include ("db_connect.php");

$sql = "select * from " . $table;
$res = $pdo->prepare($sql);
$r = $res->execute();
$book_row = $res->fetchAll(PDO::FETCH_ASSOC);

$books_count = count($book_row);

$page_max = ceil($books_count/$per);
if (!isset($_GET['page'])){
	$page = 1;
} else {
	$page = intval($_GET['page']);
}
$start = ($page - 1) * $per;

$sql = "select * from " . $table . " LIMIT " . $start . ", " . $per;
$result = $pdo->prepare($sql);
$result->execute();
$list = $result->fetchAll(PDO::FETCH_ASSOC);