<?php

	require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

	class Price {

		function __construct(){
			$connect = new Connection();
			$this->pdo = $connect->getPDO();
		}

		function getData(){
			try {
				$sql = 'SELECT t1.title as Title, t1.description as Description, max(t2.id) as DocId, 
							date(t2.create_datetime) as Apply_datetime, t3.price as Price 
								FROM Product as t1, DocPrice as t2, DocPriceBody as t3 
    							INNER JOIN Product as pr ON t3.product_id = pr.id 
    							INNER JOIN DocPrice as dp ON t3.doc_id = dp.id
    							WHERE date(t2.create_datetime) = "2017-05-16";';
				$result = $this->pdo->query($sql);
			}
			catch (PDOException $e) {
				self::db_error('Select data error: ', $e);
			}
			return $result;
		}
	}
?>