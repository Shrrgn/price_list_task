<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

	class Price {

		function __construct($date){
			$this->date = $date;
		}

		function getData(){
			$connection = new Connection();
			$result = $connection->getPrices($this->date);
			return $result;
		}
		
	}
?>