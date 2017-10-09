<?php
	require_once 'controllers/controller.php';

	new PriceController();
	/*
	$connection = new Connection();
	$result = $connection->getPrices("2017-05-16");
	foreach ($result as $i) {
		echo $i[0] . ' ' . $i[1];
	}*/
?>