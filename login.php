<?php
	class Database {
		private static $dbName 			= 'usuarios' ;
		private static $dbHost 			= 'localhost' ;
		private static $dbUsername 		= 'root';
		private static $dbUserPassword 	= '';

		private static $cont  = null;

		public function __construct() {
			exit('Init function is not allowed');
		}

		public static function connect(){
		   // One connection through whole application
	    	if ( null == self::$cont ) {
		    	try {
		        	self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
		        }
		        catch(PDOException $e) {
		        	die($e->getMessage());
		        }
	       	}
	       	return self::$cont;
		}

		public static function disconnect() {
			self::$cont = null;
		}
	}
?>

<?php

include 'database.php';
$pdo = Database::connect();
$sql = 'SELECT * FROM Habitacion';
foreach ($pdo->query($sql) as $row) {
  echo '<tr><td>'.$row['ID'].'</td><td>';
  echo $row['Disponible'] == 'true'?'Libre':'Ocupado';
  echo '</td><td><button type="button" class="btn btn-primary">Check-in</button><button type="button" class="btn btn-success">Check-out</button><button type="button" class="btn btn-info">Detalles</button>';
  echo '</td></tr>';
}
Database::disconnect();
?>
