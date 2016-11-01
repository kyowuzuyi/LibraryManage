<?php
error_reporting(E_ALL & ~E_NOTICE);
if( $_GET["title"]!="" && $_GET["author"]!="" && $_GET["manufacturer"]!="" &&  $_GET["amount"]!=""){

if($releaseDate=="")
$releaseDate='9999-12-31';
else
$releaseDate=$_GET["releaseDate"];
$cclass=$_GET["cclass"];
$title=$_GET["title"];
$author=$_GET["author"];
$manufacturer=$_GET["manufacturer"];

$isbn=$_GET["isbn"];
$amount=$_GET["amount"];


$sql="
INSERT INTO `book` (`id`, `class`, `title`, `author`, `publish`, `pubdate`, `ISBN`, `amount`) 
VALUES (NULL, '$cclass', '$title', '$author', '$manufacturer', '$releaseDate', '$isbn', '$amount')";
$dsn = 'mysql:dbname=a85828666;host=localhost;charset=utf8mb4';
$user = 'a85828666';
$password = 'a85828666';
if($dbh = new PDO($dsn, $user, $password))
    echo'Connection sucessed<br>';
$dbh->query($sql);
echo "$title <br>を登録しました";

}
else
    echo "登録失敗";
?>
