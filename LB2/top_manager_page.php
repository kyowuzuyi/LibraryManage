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
<title>トップ管理者画面</title>
<link rel="stylesheet" type="text/css" href="top_manager_page.css">
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
<img src="techc_logo.png"><h1>トップ管理者画面</h1><br /><br /><hr>

<input type="submit" onClick="window.location.href='logout.php'" value="ログアウト"  class="submit"><br /><br />

<div class="col-md-6">
  <div class="table-responsive">
    
<form action="manager_register.php" method="post">
<table class="table table-striped">
<h4><strong>管理者登録</strong></h4>
<tr><td>管理者名前</td><td><input type="text" name="managerName"></td></tr>
<tr><td>管理者ID</td><td><input type="text" name="managerID"></td></tr>
<tr><td>パスワード</td><td><input type="password" name="password"></td></tr>
<tr><td>パスワード再入力</td><td><input type="password" name="password2" id="password"></td></tr>
</table>
<span style="color: red;"></span>    

<input type="checkbox" id="passcheck" name="sample-checkbox" /><label for="passcheck" class="check_css" style="padding-right: 70px; padding-bottom:17px;">パスワードを表示</label>

<input type="submit" value="登録" class="submit">
</form>
<br /><br /><br /><hr><br /><br /><br />
</div></div>

<div class="col-md-6">
  <div class="table-responsive">
    
<form action="manager_rewrite.php" method="post">
<table class="table table-striped">
<h4><strong>管理者情報変更</strong></h4>
<tr><td>管理者ID</td><td><input type="text" name="managerID"></td></tr>
<tr><td>新しい名前</td><td><input type="text" name="managerNewName"></td></tr>
<tr><td>新しいパスワード</td><td><input type="password" name="password" id="password"></td></tr>
<tr><td>新しいパスワード再入力</td><td><input type="password" name="password2" id="password2"></td></tr>
</table>
<span style="color: red;"></span>

<input type="checkbox" id="passcheck" name="sample-checkbox" /><label for="passcheck" class="check_css" style="padding-right: 70px; padding-bottom:17px;">パスワードを表示</label>

<input type="submit" value="編集" class="submit">
</form>
<br /><br /><br /><hr><br />
</div></div>

<div class="col-md-6">
  <div class="table-responsive">
    
<form action="manager_rewrite.php" method="post">
<table class="table table-striped">
<h4><strong>管理者削除</strong></h4>
<tr><td style="padding-top:30px;">ID</td><td><input type="text" name="managerID"></td></tr>
<span style="color: red;"></span>
</table>

<input type="submit" value="削除"  class="submit">
</form>
<br /><br /><br /><br />
</div></div>

<div class="col-xs-12">
  <div class="table-responsive">
    <table class="table table-striped">
    
<form>
<hr>
<h4><strong>管理者一覧</strong></h4>
<tr>
	<td><strong>名前</strong></td>
	<td><strong>ID</strong></td>
	<td><strong>登録時間</strong></td>
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