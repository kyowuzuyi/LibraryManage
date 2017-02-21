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

<html>
<head>
<meta charset="utf-8">
<title>返却画面</title>
<link rel="stylesheet" type="text/css" href="book_return_page.css">
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
<input type="submit" onclick="window.location.href='book_loan_history_page.php'" value="履歴一覧" class="submit">
<input type="submit" onclick="window.location.href='logout.php'" value="ログアウト" class="submit"></br></br>
</div>

<div class="col-md-6">
  <div class="table-responsive">
    <table class="table table-striped">

	  <form action="" method="get" align="center">
		<tr><td>ユーザー</td><td><input type="text" name="username"></td></tr>
		<tr><td>ユーザーID</td><td><input type="text" name="userID"></td></tr>
		<tr><td>ISBN</td><td><input type="text" name="isbn"></td></tr>


	</table>
  </div>
</div>

<div class="col-md-6">
  <div class="table-responsive">
    <table class="table table-striped">
      <tr><td>書名</td><td><input type="text" name="bookname"></td></tr>
	  <tr><td>出版社</td><td><input type="text" name=""></td></tr>
	  <tr><td>著者名</td><td><input type="text" name=""></td></tr>

	</table>
  </div>
</div>

<input type="submit" value="検索" class="submit">
</form></br></br>

<div class="table-responsive">
    <table class="table table-striped">
<tr>
	<td><strong>ユーザー</strong></td>
	<td><strong>書籍ISBN</strong></td>
	<td><strong>書名</strong></td>
	<td><strong>書架</strong></td>
	<td><strong>著者名</strong></td>
	<td><strong>出版社</strong></td>
	<td><strong>出版年</strong></td>
	<td><strong>残り数</strong></td>
	<td><strong>返却</strong></td>
</tr>

<?php if(isset($list)){foreach ($list as $row){ 
	if($row['status'] == 1){
?>
<?php include ('book_loan_count_data.php'); ?>

<tr>
	<td><?=$row['username_loan']?></td>
	<td><?=$row['ISBN_loan']?></td>
	<td><?=$row2['title']?></td>
	<td><?=$row2['pressmark']?></td>
	<td><?=$row2['author']?></td>
	<td><?=$row2['publish']?></td>
	<td><?=$row2['releaseDate']?></td>
	<td><?=$row2['remained']?></td>
	<td>
		<form action="book_return.php" method="post">
			<input type="hidden" name="userID" value="<?php echo $row['userID_loan']; ?>">
			<input type="hidden" name="ISBN" value="<?php echo $row['ISBN_loan']; ?>">
			<input type="submit" value="返却">
		</form>
	</td>
</tr>
<?php }}} ?>
</table></br></br>
</div>

</div>

</div>
</div>


</body>
</html>
