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
<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1"/>
<title>ユーザー管理画面</title>
<link rel="stylesheet" type="text/css" href="manager_user_page.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
$(function() {
    $('#passcheck').change(function(){
        if ( $(this).prop('checked') ) {
            $('#password').attr('type','text');
			 $('#password1').attr('type','text');
			
        } else {
            $('#password').attr('type','password');
			 $('#password1').attr('type','password');
		
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
<img src="techc_logo.png"><h1>ユーザー管理画面</h1><br /><br /><hr>

<input type="submit" onclick="window.location.href='manager_page.php'" value="戻る" class="submit">
<input type="submit" onclick="window.location.href='logout.php'" value="ログアウト"  class="submit"><br /><br />

<div class="col-md-6">
  <div class="table-responsive">
    <table class="table table-striped">

<form action="user_register.php" method="post">
<h4><strong>ユーザー登録</strong></h4>
<tr><td>ユーザー名前</td><td><input type="text" name="userName"></td></tr>
<tr><td>ユーザーID</td><td><input type="text" name="userID"></td></tr>
<tr><td>ユーザーEmail</td><td><input type="text" name="userEmail"></td></tr>
<tr><td>パスワード</td><td><input type="password" name="password" id="password"></td></tr>
<tr><td>パスワード再入力</td><td><input type="password" name="password2" id="password1"></td></tr>

</table>
<span style="color: red;"><?php if(isset($_SESSION['user_register_log'])){echo $_SESSION['user_register_log'];} ?></span>

<input type="checkbox" id="passcheck" name="sample-checkbox" /><label for="passcheck" class="check_css" style="padding-right: 70px; padding-bottom:17px;">パスワードを表示</label>

<input type="submit" value="登録"  class="submit"></form><br /><br /><br /><hr><br /><br /><br />
</div></div>

<div class="col-md-6">
  <div class="table-responsive">
    <table class="table table-striped">

<form action="user_rewrite.php" method="post">
<h4><strong>ユーザー情報変更</strong></h4>
<tr><td>ID</td><td><input type="text" name="ID_student"></td></tr>
<tr><td>新しい名前</td><td><input type="text" name="NewName_student"></td></tr>

<tr><td>新しいパスワード</td><td><input type="password" name="password" id="password"></td></tr>
<tr><td>新しいパスワード再入力</td><td><input type="password" name="password2" id="password1"></td></tr>

</table>

<p style="color: red;"><?php if(isset($_SESSION['user_rewrite_log'])){echo $_SESSION['user_rewrite_log']."<br>";} ?></p>

<input type="checkbox" id="passcheck" name="sample-checkbox" /><label for="passcheck" class="check_css" style="padding-right: 70px;">パスワードを表示</label>

<input type="submit" value="編集"  class="submit"></form><br /><br /><br /><br /><br /><br /><br /><hr><br />
</div></div>

<div class="col-md-6">
  <div class="table-responsive">
    <table class="table table-striped">

<form action="user_delete.php" method="post">
<h4><strong>ユーザー削除</strong></h4>
<tr><td style="padding-top:30px;">ID</td><td><input type="text" name="userID"></td></tr>
<p style="color: red;"><?php if(isset($_SESSION['user_delete_log'])){echo $_SESSION['user_delete_log'];} ?></p>

</table>

<input type="submit" value="削除"  class="submit"></form><br /><br /><br /><br />
</div></div>

<div class="col-xs-12">
  <div class="table-responsive">
    <table class="table table-striped">
<form>
<hr>
<h4><strong>ユーザー一覧</strong></h4>
<tr>
	<td><strong>名前</strong></td>
	<td><strong>ID</strong></td>
	<td><strong>Email</strong></td>
	<td><strong>登録時間</strong></td>
</tr>
    <?php if(isset($list)){foreach ($list as $row){ ?>
<tr>
	<td><?=$row['name_student']?></td>
	<td><?=$row['id_student']?></td>
	<td><?=$row['email_student']?></td>
	<td><?=$row['time_register_student']?></td>
</tr>
    <?php }} ?>
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
