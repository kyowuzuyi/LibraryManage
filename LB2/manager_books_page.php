<?php
session_start();
if(!isset($_SESSION['userID'])){
    header("Location: index.php");
} else {

    if(!isset($_GET['num'])){
        $per = 5;
    } else {
        $per = $_GET['num'];
    } // １ページ表示するデータ数
    $table = "books"; //どこのデータ
    include("db_connect.php");
    //include("book_count.php");
    include("pagination.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>書籍管理画面</title>
<link rel="stylesheet" type="text/css" href="manager_books_page.css">
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
<img src="techc_logo.png"><h1>返却画面</h1></br></br><hr>
<input type="submit" onclick="window.location.href='manager_page.php'" value="履歴一覧" class="submit">
<input type="submit" onclick="window.location.href='logout.php'" value="ログアウト" class="submit"></br></br>

<input type="submit" onclick="window.location.href='books/170.php'" value="書籍登録ページへ" class="submit"></br></br>

<div class="table-responsive">
	<table class="table table-striped">

<form>
    <tr>
        <td><strong>書名</strong></td>
        <td><strong>出版社</strong></td>
        <td><strong>ISBN</strong></td>
        <td><strong>著者名</strong></td>
        <td><strong>カテゴリー</strong></td>
        <td><strong>棚番号</strong></td>
        <td><strong>総数</strong></td>
        <td><strong>残り数</strong></td>
    </tr>
<?php if(isset($list)){foreach ($list as $row){ ?>
    <tr>
        <td><?=$row['title']?></td>
        <td><?=$row['publish']?></td>
        <td><?=$row['ISBN']?></td>
        <td><?=$row['author']?></td>
        <td><?=$row['category']?></td>
        <td><?=$row['pressmark']?></td>
        <td><?=$row['amount']?></td>
        <td><?=$row['remained']?></td>
    </tr>
<?php }} ?>

</table>

<?php include ("pagination_for.php"); ?>

<table class="table table-striped">
<td>1つのページに何個まで表示する
<select name="num" class="select-box">
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
</select>
<tr><td><input type="submit" value="表示" class="button" style="margin-left:20px;"></td></tr>
<form action="" method="get">
 
</form>
</table>
</div>

<div class="table-responsive">
	<table class="table table-striped">
<form action="book_delete.php" method="post">
<hr>
<h4><strong>書籍削除</strong></h4></br>

<input type="text" name="isbn" placeholder="書籍ISBNを入れてください"></br>
<span style="color: red;"><?php if(isset($_SESSION['book_delete_log'])){echo $_SESSION['book_delete_log'];} ?></span>

<input type="submit" value="削除" class="button">
</form>
</table>
</div>

</div>
</div>

</div>
</div>

</body>
</html>
