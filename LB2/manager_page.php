<?php
session_start();
    if(!isset($_SESSION['userID'])){
        header("Location: index.php");
    }
/*---animation---*/

if(isset($_SESSION['book_info'])){
	$list_pre = $_SESSION['book_info'];
	//var_dump($list_pre);
}

//echo $_SESSION['anima'];



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1"/>
<title>管理者画面</title>
<link rel="stylesheet" type="text/css" href="manager_page.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
<div class="row">
<div class="col-xs-12" style="text-align:center;">
<div class="form11">

<img src="techc_logo.png"><h1>管理者画面</h1></br></br>
<hr>

<input type="submit" onclick="location.href='logout.php'" value="ログアウト" class="submit"><br>
<br>

<input type="submit" onclick="location.href='manager_user_page.php'" value="ユーザー管理" class="submit"><br>
<br>

<input type="submit" onclick="location.href='manager_books_page.php'" value="本管理" class="submit"><br>
<br>

<input type="submit" onclick="location.href='book_loan_history_page.php'" value="貸出履歴一覧" class="submit"><br>
<br>

<input type="submit" onclick="location.href='book_return_page.php'" value="返却" class="submit"><br>
<br>

<hr>

</div>
</div>
</div>
</div>

</body>
</html>