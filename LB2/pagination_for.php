<?php 

$url = $_SERVER['QUERY_STRING'];
if(!isset($page_max)){$page_max = "";}
for ($x=1; $x <= $page_max ; $x++) {
	echo "<a href='?" . $url . "&page=" . $x . "'> " . $x ." </a>";
}

?>
