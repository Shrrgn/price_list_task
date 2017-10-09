<?php
	
	include $_SERVER['DOCUMENT_ROOT'] . '/model/price.php';

	class PriceController {

		function __construct(){
			$price = new Price("2017-05-16");
			$data = $price->getData();

			include $_SERVER['DOCUMENT_ROOT'] . '/views/view.php';
		}
	}
?>