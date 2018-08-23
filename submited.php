<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../dbQuery.php';
session_start();

if (isset($_POST["system"]) && ($_POST["matter"]) && ($_POST["description"])){

	$system 	 = $_POST["system"];
	$matter      = $_POST["matter"];
	$description = $_POST["description"];

	echo "1";
	$db = new dbQuery;
	echo "2";
	$db->Query($system, $matter, $description);
	echo "3";
	header('Location: /redemption/index.php?message=success');
	echo "4";
        exit();

} else {
     header("Location: /redemption/index.php?message=failed");
     echo "5";
     exit();
} 

?>
