<?php
include_once("../dbQuery.php");

if(isset($_POST["data"])){

	$sql = "SELECT * FROM complaints WHERE description != '' ";
 
	if ($_POST["data"]["system"]["Albatross"] == "false" && $_POST["data"]["system"]["Turtle"] == "false" && $_POST["data"]["system"]["Secure"] == "false") {} else {
		$extraSql = "AND system IN(";

		if ($_POST["data"]["system"]["Albatross"] == "true") {
			$extraSql .= "'Albatross',";
		}

		if ($_POST["data"]["system"]["Turtle"] == "true") {
			$extraSql .= "'Turtle',";
		}

		if ($_POST["data"]["system"]["Secure"] == "true") {
			$extraSql .= "'Secure',";
		}
		$filtered = substr($extraSql, 0, -1);
		$filtered .= ") ";
		$sql .=	$filtered;
	}

	if ($_POST["data"]["matter"]["Bug"] == "false" && $_POST["data"]["matter"]["Feature"] == "false" && $_POST["data"]["matter"]["Other"] == "false") {} else {
		$extraSql = "AND matter IN(";

		if ($_POST["data"]["matter"]["Bug"] == "true") {
			$extraSql .= "'Bug',";
		}

		if ($_POST["data"]["matter"]["Feature"] == "true") {
			$extraSql .= "'Feature',";
		}

		if ($_POST["data"]["matter"]["Other"] == "true") {
			$extraSql .= "'Other',";
		}
		$filtered = substr($extraSql, 0, -1);
		$filtered .= ") ";
		$sql .=	$filtered;
	}

	$db = new dbQuery();
	$stmt = $db->filterInbox($sql);
	$result = $stmt->fetchAll();

	$json_Result = json_encode($result);

	echo($json_Result);
} else {
	echo "1";
}
?>