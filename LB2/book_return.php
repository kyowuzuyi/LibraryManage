<?php
include('db_connect.php');

$userID = $_POST['userID'];
$isbn = $_POST['ISBN'];

//======================//
$sql = "select * from books where ISBN=:ISBN";
$res = $pdo->prepare($sql);
$res->bindvalue(':ISBN',$isbn);
$res->execute();
$row = $res->fetch(PDO::FETCH_ASSOC);

$remained = $row['remained'] + 1;

$sql = "update books set remained=:remained where ISBN=:ISBN";
$res = $pdo->prepare($sql);
$res->bindValue(':remained',$remained);
$res->bindValue(':ISBN',$isbn);
$res->execute();
//======================//

$sql = "update history_loan set status=0, time_return = :time where userID_loan=:userID AND  ISBN_loan = :isbn;";
$res = $pdo->prepare($sql);
$now = date("Y-m-d H:i:s");
$res->bindValue(':time',$now);
$res->bindValue(':userID',$userID);
$res->bindValue(':isbn',$isbn);
$r = $res->execute();

header("Location: book_return_page.php");
//echo $userID;
//echo $isbn;

?>