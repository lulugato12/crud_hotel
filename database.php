<?php
	class Database {
		private static $dbName 			= '<<my_db_name>>' ; 
		private static $dbHost 			= 'localhost' ;
		private static $dbUsername 		= '<<my_db_Username>>';
		private static $dbUserPassword 	= '<<my_db_passwd>>';
		
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