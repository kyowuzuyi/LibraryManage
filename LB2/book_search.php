<?php

include ('db_connect.php');


if(!isset($_GET['title']) && !isset($_GET['publish']) && !isset($_GET['isbn']) && !isset($_GET['author']) && !isset($_GET['category']) && !isset($_GET['pressmark'])){

	$_SESSION['book_search_log'] = "検索情報を入力してください";

}else{
    $_SESSION['book_info']=1;
	unset($_SESSION['book_search_log']);
	
	if(!isset($_GET['num'])){$num = 10;}
	if(!isset($_GET['start'])){$start = 0;}

	$title = $_GET['title']; 		if($title == ""){ $title = "!@#$%^&*(";}
	$publish = $_GET['publish']; 	if($publish == ""){ $publish = "!@#$%^&*(";}
	$isbn = $_GET['isbn']; 			if($isbn == ""){ $isbn = "!@#$%^&*(";}
	$author = $_GET['author']; 		if($author == ""){ $author = "!@#$%^&*(";}
	$category = $_GET['category']; 	if($category == ""){ $category = "!@#$%^&*(";}
	$pressmark = $_GET['pressmark'];if($pressmark == ""){ $pressmark = "!@#$%^&*(";}

	$sql = "select * from books where title LIKE :title OR publish LIKE :publish OR isbn LIKE :isbn OR author LIKE :author OR category LIKE :category OR pressmark LIKE :pressmark";

	$res = $pdo->prepare($sql);
	$res->bindValue(":title", '%' . $title . '%');
	$res->bindValue(":publish", '%' . $publish . '%');
	$res->bindValue(':isbn', '%' . $isbn . '%');
	$res->bindValue(':author', '%' . $author . '%');
	$res->bindValue(':category', '%' . $category . '%');
	$res->bindValue(':pressmark', '%' . $pressmark . '%');
	$r = $res->execute();

	$list = $res->fetchAll(PDO::FETCH_ASSOC);


	if ($list == NULL) {
		$_SESSION['book_search_log'] = "本を見つかりません。";
	}else{
		unset($_SESSION['book_search_log']);
	}

	$books_count = count($list);
	
	$page_max = ceil($books_count/$num);

	if(!isset($_GET['page'])){
		$page = 1;
	} else {
		$page = intval($_GET['page']);
	}
	$start = ($page - 1) * $num;

		$sql = "select * from books where title LIKE :title OR publish LIKE :publish OR isbn LIKE :isbn OR author LIKE :author OR category LIKE :category OR pressmark LIKE :pressmark LIMIT :start,:num";

	$res = $pdo->prepare($sql);
	$res->bindValue(":title", '%' . $title . '%');
	$res->bindValue(":publish", '%' . $publish . '%');
	$res->bindValue(':isbn', '%' . $isbn . '%');
	$res->bindValue(':author', '%' . $author . '%');
	$res->bindValue(':category', '%' . $category . '%');
	$res->bindValue(':pressmark', '%' . $pressmark . '%');
	$res->bindValue(':start', +$start ,PDO::PARAM_INT);
	$res->bindValue(':num', +$num ,PDO::PARAM_INT);
	$r = $res->execute();

	$list = $res->fetchAll(PDO::FETCH_ASSOC);
	$_SESSION['list'] = $list;

}