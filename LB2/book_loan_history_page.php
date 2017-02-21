<?php 

    session_start();
    if(!isset($_SESSION['userID'])){
        header("Location: index.php");
    }
    // もしGETの値がないなら、全部データを表示する
    if (!isset($_GET['userID']) && !isset($_GET['username']) && !isset($_GET['isbn'])){
    	include ('book_loan_count_all.php');
    } else {
    	include ('book_loan_count.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>貸出履歴画面</title>
<link rel="stylesheet" type="text/css" href="book_loan_history_page.css">
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
<img src="techc_logo.png"><h1>貸出履歴画面</h1><br /><br /><hr>

<input type="submit" onclick="window.location.href='manager_page.php'" value="戻る" class="submit">
<input type="submit" onclick="location.href='logout.php'" value="ログアウト" class="submit"><br /><br />

<div class="form1">



</div>
</div>
</div>

<div class="col-xs-12">
  <div class="table-responsive">
    <table class="table table-striped">
    
    <h3>出履歴一覧</h3>

<form>
<tr>
	<td><strong>ユーザー</strong></td>
	<td><strong>書名</strong></td>
	<td><strong>出版社</strong></td>
	<td><strong>ISBN</strong></td>
	<td><strong>著者名</strong></td>
	<td><strong>出版日</strong></td>
	<td><strong>カテゴリー</strong></td>
	<td><strong>棚番号</strong></td>
	<td><strong>総数</strong></td>
	<td><strong>残り数</strong></td>
	<td><strong>借りる時間</strong></td>
	<td><strong>返却時間</strong></td>
</tr>
<?php if(isset($list)){foreach ($list as $row){ ?>
<?php include ('book_loan_count_data.php'); ?>
<tr>
	<td><?=$row['username_loan']?></td>
	<td><?=$row2['title']?></td>
	<td><?=$row2['publish']?></td>
	<td><?=$row['ISBN_loan']?></td>
	<td><?=$row2['author']?></td>
	<td><?=$row2['releaseDate']?></td>
	<td><?=$row2['category']?></td>
	<td><?=$row2['pressmark']?></td>
	<td><?=$row2['amount']?></td>
	<td><?=$row2['remained']?></td>
	<td><?=$row['time_loan']?></td>
	<td><?=$row['time_return']?></td>
</tr>
<?php }} ?>
</form>
</table>



</div>
</div>

</body>
</html>
