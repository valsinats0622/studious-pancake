<?php 

/**
 * 
 */
class pdodb extends pdosql {
	private $pdo;
	private $host = '127.0.0.1';
	private $db   = 'homestead';
	private $user = 'homestead';
	private $pass = 'secret';
	private $charset = 'utf8mb4';	
	private $opt = [
  	 	 	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
			];
	
	function __construct(argument) {
		$dsn = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset."";
		$this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
	}

	public function run($sql, $params = NULL) {
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($params);
		return $stmt; 
	}

	public function runinsert($sql, $params = NULL) {
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($params);
		$id = $this->pdo->lastInsertId();
		return $id; 
	}
}


	
	
	
	




?>