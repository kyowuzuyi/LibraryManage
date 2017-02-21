<?php
	$sql = "select * from books where ISBN=:ISBN";
	$res = $pdo->prepare($sql);
	$res->bindvalue(':ISBN',$row['ISBN_loan']);
	$r = $res->execute();
	$row2 = $res->fetch(PDO::FETCH_ASSOC);