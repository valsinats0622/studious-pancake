<?php

include_once("dbQuery.php");
error_reporting("E_ALL");
ini_set('display_errors', 1);

if(isset($_POST["pwd_new"]) &&($_POST["pwd_confirm"])) {
	$db = new dbQuery;

	$pwd   = password_hash($_POST['pwd_new'], PASSWORD_BCRYPT);

	$db->updatePwd($pwd);

	header('Location: userLogIn.php?signup=password_changed');
    exit(); 
}

?>

