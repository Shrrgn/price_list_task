<?php 
	class Connection {

		private static $host = "localhost";
		private static $db = "users_db";
		private static $user = "artem";
		private static $password = "artem";

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

		function destroy_connection(){
			$this->pdo = null;
		}

		static function db_error($string, $exception){
			$output = $string . $exception->getMessage();
			include 'output.html.php';
			exit();
		}
	}
?>