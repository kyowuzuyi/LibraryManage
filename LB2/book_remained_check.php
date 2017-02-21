<?php

	$ISBN = $row['ISBN'];

	$sql3 = "select * from books where ISBN=:ISBN";
	$res3 = $pdo->prepare($sql3);
	$res3->bindvalue(':ISBN',$ISBN);
	$res3->execute();
	$row3 = $res3->fetch(PDO::FETCH_ASSOC);

	$remained = $row3['remained'];