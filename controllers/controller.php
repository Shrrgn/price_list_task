<?php
	
	require_once '../model/price.php';

	class PriceController {

		function __construct(){
			$this->price = new Price();
			$data = $price.getData();

			include '../views/view.php';
		}
	}
?>