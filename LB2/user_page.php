<?php

    session_start();
    if(!isset($_SESSION['userID'])){
        header("Location: index.php");
    }
    include ('book_search.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ユーザー画面</title>
<link rel="stylesheet" type="text/css" href="user_page.css">
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
<img src="techc_logo.png"><h1>ユーザー画面</h1><br /><br /><hr>
<!--
<input type="submit" onclick="window.location.href='user_loan_history_page.php'" value="履歴一覧" class="submit">
-->
<input type="submit" onclick="window.location.href='logout.php'" value="ログアウト" class="submit"><br>
<br>
</div>

<div class="col-md-6">
  <div class="table-responsive">
    <table class="table table-striped">

<form action="" method="get" align="center">
<tr><td>書名</td><td><input type="text" name="title" value="<?php if(isset($_GET['title'])){echo $_GET['title'];} ?>"></td></tr>
<tr><td>出版社</td><td><input type="text" name="publish" value="<?php if(isset($_GET['publish'])){echo $_GET['publish'];} ?>"></td></tr>
<tr><td>著者名</td><td><input type="text" name="author" value="<?php if(isset($_GET['author'])){echo $_GET['author'];} ?>"></td></tr>

</table>
</div>
</div>

<div class="col-md-6">
  <div class="table-responsive">
    <table class="table table-striped">

<tr><td>ISBN</td><td><input type="text" name="isbn" value="<?php if(isset($_GET['isbn'])){echo $_GET['isbn'];} ?>"></td></tr>
<tr><td>種類</td><td><input type="text" name="category" value="<?php if(isset($_GET['category'])){echo $_GET['category'];} ?>"></td></tr>
<tr><td>棚番号</td><td><input type="text" name="pressmark" value="<?php if(isset($_GET['pressmark'])){echo $_GET['pressmark'];} ?>"></td></tr>

</table>
</div>
</div>


<br>

<input type="submit" value="検索" class="submit"></form></br></br>

<div class="table-responsive">
    <table class="table table-striped">

<tr>
	<td><strong>書名</strong></td>
	<td><strong>出版社</strong></td>
	<td><strong>ISBN</strong></td>
	<td><strong>著者名</strong></td>
	<td><strong>出版日</strong></td>
	<td><strong>カテゴリー</strong></td>
	<td><strong>棚番号</strong></td>
	<td><strong>総数</strong></td>
	<td><strong>残り数</strong></td>
    <td><strong>状態</strong></td>
</tr>
<?php if(isset($list)){foreach ($list as $row){ ?>
<tr>
	<td><?=$row['title']?></td>
	<td><?=$row['publish']?></td>
	<td><?=$row['ISBN']?></td>
	<td><?=$row['author']?></td>
	<td><?=$row['releaseDate']?></td>
	<td><?=$row['category']?></td>
	<td><?=$row['pressmark']?></td>
	<td><?=$row['amount']?></td>
	<td><?=$row['remained']?></td>
    <td>
                <?php 
                    include ('book_status_check.php');
                    include ('book_remained_check.php');

                    if ($remained > 0) {
                ?>
                    	<input type="button" onclick="window.location.href='loan_check.php?ISBN=<?php echo $row['ISBN']; $_SESSION['url'] = $_SERVER['QUERY_STRING']; ?>'" value="借りる" class="button">
                <?php } else { ?>
                        <span style="color: red">残り０本</span>
                <?php } ?>

    </td>
</tr>
<?php }} ?>
</form>
</table>
<?php include("pagination_for.php"); ?>
</br></br>
</div>

</div>

</div>
</div>

</body>
</html>
