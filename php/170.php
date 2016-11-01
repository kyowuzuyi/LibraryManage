<?php
error_reporting(E_ALL & ~E_NOTICE);
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
<html>
<head>
<style type="text/css">

input{ width:500px;}
</style>
<title>amazon</title>
</head>
<body>

*がつくのは必須項目
<form method="get" >
<input type="text" name="isbn" value="<?php echo h($isbn); ?>">
<input type="submit"  style="width:auto" value="検索">
</form>


<form action="171.php" target="fish" method="get">
<input type="text" name="title"  value="<?php echo h($title); ?>" required>名*<br>
<input type="text" name="author" value="<?php echo h($author); ?>" required>作者*<br>
<input type="text" name="manufacturer" value="<?php echo h($manufacturer); ?>" required>出版社*<br>
<input type="text" name="releaseDate" value="<?php echo h($releaseDate); ?>">出版日<br>
<input type="text" name="isbn" value="<?php echo h($isbn); ?>">isbn<br>
<input type="number" name="amount" min="0" value="1" required>本の量*<br>
<input type ="radio" style="width:auto" name="cclass" value="book"<?php if($cclass=="book") echo "checked"?> required >本
<input type ="radio" style="width:auto" name="cclass" value="anime"<?php if($cclass=="anime") echo "checked"?>  >アニメ
<input type ="radio" style="width:auto" name="cclass" value="game"<?php if($cclass=="game") echo "checked"?>  >ゲーム<br>
<input type="submit" style="width:auto" value="登録">
</form>
<iframe src="172.php" name="fish"></iframe>

 
</body>
</html>



