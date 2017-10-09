<?php 
	class Connection {

		private static $host = "localhost";
		private static $db = "test1";
		private static $user = "user";
		private static $password = "password";

		function __construct(){
			try {
				$pdo = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$db, self::$user, self::$password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->exec('SET NAMES "utf8"') ;
			}
			catch (PDOException $e) {
				self::db_error("Couldn't make connection to database: ", $e);
			}
			$this->pdo = $pdo;
		}

		function getPDO(){
			return $this->pdo;
		}

		function getPrices($date){
			try {
				$sql = 'SELECT title, description, doc_id, date(create_datetime), price 
							FROM DocPriceBody dpc 
							INNER JOIN Product as pr ON dpc.product_id = pr.id 
    						INNER JOIN DocPrice as dp ON dpc.doc_id = dp.id 
    						WHERE date(create_datetime) = :create_date
    						GROUP BY title
    						HAVING max(dpc.id)';
				$s = $this->pdo->prepare($sql);
				$s->bindParam(':create_date', $date, PDO::PARAM_STR);
				$s->execute();
			}
			catch (PDOException $e) {
				self::db_error('Select data error: ', $e);
			}
			return $s;
		}

		static function db_error($string, $exception){
			$output = $string . $exception->getMessage();
			include 'output.html.php';
			exit();
		}
	}
?>