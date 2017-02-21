<?php 
	session_start();
	include ('book_search.php');
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1"/>
<title>トップ画面</title>
<link rel="stylesheet" type="text/css" href="index.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
$(function() {
    $('#passcheck').change(function(){
        if ( $(this).prop('checked') ) {
            $('#password').attr('type','text');
        } else {
            $('#password').attr('type','password');
        }
    });
});
</script>
</head>

<body>

<div class="container">
<div class="row">
<div class="col-xs-12" style="text-align:center;">
<div class="form11">
<img src="techc_logo.png"><h1>トップ画面</h1><br /><br />
</div>
<hr>

<div class="form">
<form action="login.php" name="login" method="post">
<table border="0" align="center";>
<tr><td><input type="text" name="userID" placeholder="ユーザー名"></td></tr>
<tr><td><input type="password" name="userPassword" id="password" placeholder="パスワード"></td></tr>
</table>


<input type="checkbox" id="passcheck" name="sample-checkbox"/><label for="passcheck" class="check_css">パスワードを表示</label>

<table border="0" align="center">
<tr><td><input type="submit" value="ログイン" class="submit"></td></tr>

<p style="color: red;"><?php if(isset($_SESSION['login_log'])){echo $_SESSION['login_log'];} ?></p>
</table><br />

</form>
</div>




<div class="form1">

<div class="col-md-6">
  <div class="table-responsive">
    <table class="table table-striped">

<form action="" method="get" align="center">
<tr><td style="padding-right: 35px;">書名</td><td><input type="text" name="title" value="<?php if(isset($_GET['title'])){echo $_GET['title'];} ?>"></td></tr>
<tr><td style="padding-right: 35px;">出版社</td><td><input type="text" name="publish" value="<?php if(isset($_GET['publish'])){echo $_GET['publish'];} ?>"></td></tr>
<tr><td style="padding-right: 35px;">著者名</td><td><input type="text" name="author" value="<?php if(isset($_GET['author'])){echo $_GET['author'];} ?>"></td></tr>
</table>
</div>
</div>

<div class="col-md-6">
  <div class="table-responsive">
    <table class="table table-striped">
<tr><td>ISBN</td><td><input type="text" name="isbn" value="<?php if(isset($_GET['isbn'])){echo $_GET['isbn'];} ?>"></td></tr>
<tr><td>カテゴリー</td><td><input type="text" name="category" value="<?php if(isset($_GET['category'])){echo $_GET['category'];} ?>"></td></tr>
<tr><td>棚番号</td><td><input type="text" name="pressmark"  value="<?php if(isset($_GET['pressmark'])){echo $_GET['pressmark'];} ?>"></td></tr>

</table>
</div>
</div>



<p style="color: red;"><?php if(isset($_SESSION['book_search_log'])){echo $_SESSION['book_search_log'];} ?></p>
<br>

<input type="submit" value="検索" class="submit"></form></br></br>

<div class="table-responsive">
    <table class="table table-striped">
<form>
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
</tr>
<?php }} ?>
</form>
</table>
<?php include("pagination_for.php"); ?>
</br></br></br>
</div>

</div>
</div>


</div>
</div>


</div>
</div>


</body>
</html>
