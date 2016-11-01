<?php
error_reporting(E_ALL & ~E_NOTICE);
// XSS対策
function h($s) {
	return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}


$search1=trim($_GET['search1']);
$search2=trim($_GET['search2']);
$search3=trim($_GET['search3']);
$search4=trim($_GET['search4']);
$search5=trim($_GET['search5']);
$time=trim($_GET['time']);
$kazu=trim($_GET['kazu']);
$cclass=$_GET['cclass'];

if($time and !empty($search5))
 $sql="select * from book where title like ?
 and author like ?
and publish like ?
and ISBN like ?
and amount >=?
and pubdate <?
and class like ?";
else
	$sql="select * from book where title like ?
  and author like ?
 and publish like ?
 and ISBN like ?
 and amount >=?
 and pubdate >?
 and class like ?";


$dsn = 'mysql:dbname=a85828666;host=localhost;charset=utf8mb4';
$user = 'a85828666';
$password = 'a85828666';

if($dbh = new PDO($dsn, $user, $password))
    echo'Connection sucessed<br>';
    else
		die('failed');

$stmt=$dbh->prepare($sql);
$stmt->execute(
array(
	"%{$search1}%",
	"%{$search2}%",
	"%{$search3}%",
	"%{$search4}%",
	$kazu,
	$search5,
	"%{$cclass}%"));


 $stmt->setFetchMode(PDO::FETCH_NUM);
 $booksamount=$stmt->rowCount();


?>
<!DOCTYPE html>
<meta charset="UTF-8">
<head>
<title>図書館</title>
</head>
<body>
<h1>蔵書検索システム</h1>
<form action="" method=”get”>
<input type="text" name="search1" value="<?php echo h(trim($_GET['search1'])); ?>">タイトル<br>
<input type="text" name="search2" value="<?php echo h($search2); ?>">作者<br>
<input type="text" name="search3" value="<?php echo h($search3); ?>">出版社 or 制作<br>
<input type="text" name="search4" value="<?php echo h($search4); ?>">ISBN ex:9781234567890<br>
<input type="text" name="search5" value="<?php echo h($search5); ?>"
pattern="(?!0000)[0-9]{4}-((0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-8])|(0[13-9]|1[0-2])-(29|30)|(0[13578]|1[02])-31)">
<label><input type="radio" value="1" name="time" <?php if($time==1) echo "checked"?>>以前</label>
<label><input type="radio" value="0" name="time" <?php if($time==0) echo "checked"?>>以後</label>
出版日ex:2001-12-31<br>
<label><input type ="radio" name="cclass" value=""<?php if($cclass==0) echo "checked"?>  >全種類</label>
<label><input type ="radio" name="cclass" value="book"<?php if($cclass=="book") echo "checked"?> required>本</label>
<label><input type ="radio" name="cclass" value="anime"<?php if($cclass=="anime") echo "checked"?>  >アニメ</label>
<label><input type ="radio" name="cclass" value="game"<?php if($cclass=="game") echo "checked"?>  >ゲーム<br></label>
<label><input type ="radio" name="kazu" value="1"<?php if($kazu==1) echo "checked"?>  >在庫あるだけ</label>
<label><input type ="radio" name="kazu" value="0"<?php if($kazu==0) echo "checked"?>  >ないのも含む</label>
<input type="submit" value="検索">
</form>

計<?php echo $booksamount; ?>冊
 <table width=100% border=1>
<tr>
  <td>id</td>
  <td>種類</td>
  <td>名</td>
  <td>作者</td>
  <td>出版社 or 制作</td>
  <td>出版日 or 発売日</td>
  <td>isbn</td>
  <td>数</td>
  <td>貸出</td>
</tr>
<tr>
<?php
foreach($stmt as $row)
echo '<td>'.implode("</td>\n<td>",$row).'</td></tr>';
?>

</table>
</body>
