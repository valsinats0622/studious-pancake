<?php
	include_once ("../dbQuery.php");
	$db = new dbQuery;
	$stmt = $db->checkName($_POST["data"]);
    $result = $stmt->fetchAll();
    if (!empty($result) && $result != false) {   	
    	$exists = 1;    
    } else {
    	$exists = 0;
    }
    echo $exists;

?>