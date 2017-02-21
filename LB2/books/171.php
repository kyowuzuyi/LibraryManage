<?php
error_reporting(E_ALL & ~E_NOTICE);

session_start();
include ("../db_connect.php");

$title = $_GET["title"];
$author = $_GET["author"];
$publish = $_GET["manufacturer"];
$releaseDate = $_GET["releaseDate"];
$isbn = $_GET["isbn"];
$amount = $_GET["amount"];
$remained = $amount;
$category = $_GET["cclass"];

$sql = "select * from books where title=:title";
$res = $pdo->prepare($sql);
$res->bindValue(':title',$title);
$r = $res->execute();

if ($r === true){

    $row = $res->fetch(PDO::FETCH_ASSOC);

    if($row === false) {

        if ($title != "" && $author != "" && $publish != "" && $amount != "") {

            $sql = "insert into books(title, author, publish, releaseDate, ISBN, amount, remained, category) VALUE (:title, :author, :publish, :releaseDate, :isbn, :amount, :remained, :cclass)";

            $res = $pdo->prepare($sql);
            $res->bindValue(':title', $title);
            $res->bindValue(':author', $author);
            $res->bindValue(':publish', $publish);
            $res->bindValue(':releaseDate', $releaseDate);
            $res->bindValue(':isbn', $isbn);
            $res->bindValue(':amount', $amount);
            $res->bindValue(':remained', $remained);
            $res->bindValue(':cclass', $category);
            $r = $res->execute();

            if ($r === true) {
                $book_log = $title . "を登録しました";
                echo "<p style='color: red;'>" . $book_log . "</p>";
            } else {
                $book_log = "登録失敗";
                echo "<p style='color: red;'>" . $book_log . "</p>";
            }

        } else {
            $book_log = "条件が足りませんので、登録できない。";
            echo "<p style='color: red;'>" . $book_log . "</p>";
        }

    }else{
        $book_log = "この本を存在していますので、別の本を登録してください。";
        echo "<p style='color: red;'>" . $book_log . "</p>";
    }

}else {
    $book_log = "error";
    echo "<p style='color: red;'>" . $book_log . "</p>";
}
