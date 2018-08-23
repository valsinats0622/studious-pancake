<?php 
error_reporting("E_ALL");
ini_set('display_errors', 1);

include_once("db/db.php");

class dbQuery extends pdodb {


	public function saveData ($orgName, $orgnr, $regar, $kom, $status, $lagenheter ,$foljare, $updaterad, $avgKm) { 

		$params = array(
			'orgNamn'      => $orgName,
			'orgNummer'    => $orgnr,
			'registrering' => $regar, 
			'komun'        => $kom, 
			'status'       => $status, 
			'lagenheter'   => $lagenheter, 
			'foljare'      => $foljare, 
			'uppdaterad'    => $updaterad,
			'avgiftKm'     => $avgKm  
		);

		$sql = "INSERT INTO brfDb (orgName, orgNr, registrering_ar, komun, status, lagenheter, foljare, uppdaterad, avgiftKm) VALUES (:orgNamn, :orgNummer, :registrering, :komun, :status, :lagenheter, :foljare, :uppdaterad, :avgiftKm)";

		$this->runinsert($sql, $params);
	} 

	public function isRecord ($numb){

		$params = array(
			'orgNummer' => $numb
		);

		$sql = "SELECT * FROM brfDb WHERE orgNr=:orgNummer";

		$stmt = $this->run($sql,$params);

		return $stmt;
	}
}
?>
