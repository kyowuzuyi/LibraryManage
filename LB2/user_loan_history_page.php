<?php
    session_start();
    if(!isset($_SESSION['userID'])){
        header("Location: index.php");
    } else {

        include("db_connect.php");
        include("user_count.php");
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>貸出履歴画面(ユーザー)</title>
<link rel="stylesheet" type="text/css" href="user_loan_history_page.css">
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

<img src="techc_logo.png"><h1>貸出履歴画面(ユーザー)</h1></br></br>
<hr>

<input type="submit" onClick="window.location.href='user_page.php'" value="戻る" class="submit">
<input type="submit" onClick="window.location.href='logout.php'" value="ログアウト" class="submit"><br><br>

<div class="col-xs-12">
  <div class="table-responsive">
    <table class="table table-striped">
    
<form>    
<h3 style="text-align:left;"><strong>貸出履歴一覧</strong></h3>
<tr>
	<td><strong>書名</strong></td>
	<td><strong>ISBN</strong></td>
	<td><strong>残り数</strong></td>
	<td><strong>借りる時間</strong></td>
    <td><strong>返却時間</strong></td>
    <td><strong>状況</strong></td>
</tr>

</form>
</table>

</div>
</div>

</div>
</div>

</div>
</div>

</body>
</html>
