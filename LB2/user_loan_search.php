<?php

include ('db_connect.php');

if(!isset($_POST['title']) && !isset($_POST['publish']) && !isset($_POST['isbn']) && !isset($_POST['author']) && !isset($_POST['category']) && !isset($_POST['pressmark'])){
}else{

    $title = $_POST['title'];
    $publish = $_POST['publish'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $pressmark = $_POST['pressmark'];

    $sql = "select * from books where title=:title OR publish=:publish OR isbn=:isbn OR author=:author OR category=:category OR pressmark=:pressmark";

    $res = $pdo->prepare($sql);
    $res->bindValue(':title',$title);
    $res->bindValue(':publish',$publish);
    $res->bindValue(':isbn',$isbn);
    $res->bindValue(':author',$author);
    $res->bindValue(':category',$category);
    $res->bindValue(':pressmark',$pressmark);
    $r = $res->execute();

    $list = $res->fetchAll(PDO::FETCH_ASSOC);
}