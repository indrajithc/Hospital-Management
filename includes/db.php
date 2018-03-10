<?php
	
	
	//Define 
	define('SYSTEM_NAME', 'DASystem');	
	define('PATH', "http://".$_SERVER['SERVER_NAME'].'/'.SYSTEM_NAME);
	define('JS', PATH.'/assets/js');
	define('CSS',PATH.'/assets/css');
	define('DB',PATH.'/includes/db.php');
	
	class Database extends Exception {
		
		// Setting up variables
		private $host = 'localhost';
		private $username = SYSTEM_NAME;
		private $password = '2Z0YJ6UybNNqU9XJ';
		private $db = SYSTEM_NAME;
		
		private $dbn;
		
		
		// Defining constructor
		public function __construct() {
			
			$this->connect();
			
		}
		
		// Database connection
		public function connect() {
			
			try {
				
				//Crearing database source name 
				$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
				
				//Creating object in PDO
				$this->dbn = new PDO($dsn, $this->username, $this->password);
				$this->dbn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->dbn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
				return true;
				
			} catch( PDOException $e ) {
				
				echo 'ERROR: ' . $e->getMessage();
				
			}
			
		}
		
		public function execute_data( $sql, $array = NULL ) {
			
			try {
				
				$stmnt = $this->dbn->prepare($sql);
				$istrue  = $stmnt->execute($array);
				
				if( $istrue ) {
					
					return true;
					
				} else {
					
					return false;
					
				}
				
			}  catch (PDOException $e) {
				
			   echo "Error: " . $e->getMessage() . "<br />\n";
			   
			}
			
		}
		
		public function display( $sql, $array = NULL ) {
			
			try {
				
				$stmnt = $this->dbn->prepare($sql);
				$stmnt->execute( $array );
				
				return $istrue = $stmnt->fetchAll();
				
			}  catch (PDOException $e) {
				
			   echo "Error: " . $e->getMessage() . "<br />\n";
			   
			}
			
		}
		
	}	
	
	
?>