<?php
	include_once ("dbQuery.php");
	$db = new dbQuery;
	$stmt = $db->checkName($_POST['data']);
	$result = $stmt->fetchAll();
	if (!empty($result) && $result != false){
		$taken = 0;
	} else {
		$taken = 1;
	} 
	echo $taken;
?>	
