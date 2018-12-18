<?php 
	class DB{
		private $hostname = 'localhost';
		private $dbuser = 'yourdbusername';
		private $dbpass = 'yourdbpass';
		private $dbname = 'yourdb';
		private $charset = 'utf8mb4';

		public static function connect(){
			$db = new DB;
			try{

				$dsn = "mysql:host=".$db->hostname.";dbname=".$db->dbname;
				$pdo = new PDO($dsn, $db->dbuser, $db->dbpass);

				// Sett pdo exception as default
		 		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 		// Setting default fetch method as object
		 		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				// Returning pdo connection
				return $pdo;

			}catch(PDOException $e){
				// If connection failed!
				echo "Connection Failed! ". $e->getMessage();
			}
		}
	}


	// Creating Class object
	$db = new DB;

	// Preparing Query
	$stmt = DB::connect()->prepare("SELECT * FROM tablename WHERE something = ?");
	// Parameter for query
	$something = 'something_you_are_validating_with';
	// Setting paramerter for query
	$stmt->bindParam(1, $something, PDO::PARAM_STR);
	// Executing Query
	$stmt->execute();
	// Checking if query executed successfully
	if($stmt->rowCount()){

		// Fetching data
		$result = $stmt->fetchAll();
		// Encoding object to json and printing
		echo  json_encode($result);
	}
 
?>