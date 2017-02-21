<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
function h($s) {
	return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}




define("ACCESS_KEY_ID"     , 'AKIAIX3VOCUPLGJ4PXFA');
define("SECRET_ACCESS_KEY" , '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');
define("ASSOCIATE_TAG"     , 'a85828666-22');
define("ACCESS_URL"        , 'http://ecs.amazonaws.jp/onca/xml');
 
 
 
@$isbn =$_GET['isbn']; // 取得したい本のISBN番号を指定

$params = array(); 
$params['Service']        = 'AWSECommerceService';
$params['Version']        = '2011-08-02';
$params['Operation']      = 'ItemLookup';
$params['ItemId']         = $isbn;
$params['IdType']         = 'ISBN';
$params['SearchIndex']    = 'Books';
$params['AssociateTag']   = ASSOCIATE_TAG;
$params['ResponseGroup']  = 'ItemAttributes,Offers,Images,Reviews';
$params['Timestamp']      = gmdate('Y-m-d\TH:i:s\Z');
 
ksort($params);

$canonical_string = 'AWSAccessKeyId='.ACCESS_KEY_ID;
foreach ($params as $k => $v) {
    $canonical_string .= '&'.urlencode_RFC3986($k).'='.urlencode_RFC3986($v);
}
 
function urlencode_RFC3986($str) {
    return str_replace('%7E', '~', rawurlencode($str));
}
 
$parsed_url = parse_url(ACCESS_URL);
$string_to_sign = "GET\n{$parsed_url['host']}\n{$parsed_url['path']}\n{$canonical_string}";
 
$signature = base64_encode(
    hash_hmac('sha256', $string_to_sign, SECRET_ACCESS_KEY, true)
);
 
$url = ACCESS_URL.'?'.$canonical_string.'&Signature='.urlencode_RFC3986($signature);
 
@$response = file_get_contents($url); //Amazonへレスポンス
 
$parsed_xml = null;
// レスポンスを配列で取得
if (isset($response)) {
    $parsed_xml = simplexml_load_string($response);}
 
 // Amazonへのレスポンスが正常に行われていたら
if ($response && isset($parsed_xml) && !$parsed_xml->faultstring && !$parsed_xml->Items->Request->Errors) {
    foreach ($parsed_xml->Items->Item as $current) {
        @$title          = $current->ItemAttributes->Title; // タイトル
        @$author         = $current->ItemAttributes->Author; // 著者
        @$manufacturer   = $current->ItemAttributes->Manufacturer; // 出版社
        @$imgURL         = $current->LargeImage->URL; // 本の表紙の大サイズのURL(サイズは小中大から選べる)  
        @$bookURL        = $current->DetailPageURL; // Amazonの本のページのURL
        @$releaseDate    = $current->ItemAttributes->ReleaseDate; // 出版日
 
        @$authors = $author[0];
        // 著者が複数いる場合
        if (count($author) > 1) {
            for ($i = 1; $i < count($author); $i++) {
                $authors = $authors. ",". $author[$i];
            }
		}
	}
}


?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=0.5, user-scalable=no" />
<title>書籍登録ページ</title>
<link rel="stylesheet" type="text/css" href="170.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
<div class="row">
<div class="col-md-12" style="text-align:center;">
<div class="form11">

<img src="../techc_logo.png"><h1>書籍登録ページ</h1></br></br>
<hr>

<input type="submit" onClick="window.location.href='../manager_books_page.php'" value="戻る" >
<input type="submit" onClick="window.location.href='../logout.php'" value="ログアウト" ></br></br></br>

<div class="col-md-6" style="text-align:center;">
<h4 style="text-align:center;"><strong>本 ～　登録</strong></h4>
<p>(<label class="star"></label>) 付いてるところ必要です。</p>
<form action="171.php" target="fish" method="get" class="img-responsive">
<label class="star" style="padding-right:50px;">名 </label><input type="text" name="title" placeholder="名" value="<?php echo h($title); ?>" required><br>
<label class="star" style="padding-right:39px;">作者</label><input type="text" name="author" placeholder="作者" value="<?php echo h($author); ?>" required><br>
<label class="star" style="padding-right:24px;">出版社</label><input type="text" name="manufacturer" placeholder="出版社" value="<?php echo h($manufacturer); ?>" required><br>
<label style="padding-right:29px;">出版日</label><input type="text" name="releaseDate" placeholder="出版日" value="<?php echo h($releaseDate); ?>"><br>
<label style="padding-right:41px;">ISBN</label><input type="text" name="isbn" placeholder="ISBN" value="<?php echo h($isbn); ?>"><br>
<label class="star" style="padding-right:25px;">本の量</label><input type="number" name="amount" placeholder="本の量" min="0" value="1" required><br>
<label style="padding-right:25px;">カテゴリー</label>
<select name="cclass" class="select-box">
        <option>文学・評論</option>
        <option>歴史・地理</option>
        <option>科学・テクノロジー</option>
        <option>コンピュータ・IT</option>
        <option>アート・建築・デザイン</option>
        <option>資格・検定・就職</option>
        <option>語学・辞事典・年鑑</option>
        <option>コミック・ラノベ</option>
        <option>ゲーム攻略本</option>
        <option>雑誌</option>
        <option>その他</option>
    </select></br></br>

<input type="submit" value="登録" ></br></br><hr></br>
</form>

</div>

<div class="col-md-6" style="text-align:center;">

<h4><strong>本 ～　検索</strong></h4>
<p>ISBN で検索！</p>
<form method="get" >
    <input type="text" name="isbn" value="" placeholder="ISBN を入れてください" value="<?php echo h($isbn); ?>">
    <input type="submit" style="width:auto" value="検索" >
</form>
</br></br>
<iframe src="172.php" name="fish"></iframe>
<hr>
</div>


</div>
</div>
</br></br></br></br>
</body>
</html>
