<?php 
include_once("db.php");
error_reporting("E_ALL");

class pdosql extends pdodb {
	
	public function test(){
		$sql = "SELECT * FROM test WHERE id != 1";
		$pdo = $this->run($sql);
		$result = $pdo->fetchAll();
		return $result;
	}
	
}
?>