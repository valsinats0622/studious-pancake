<?php
include_once("../dbQuery.php");
error_reporting("E_ALL");
ini_set('display_errors', 1);

if(isset($_POST["first"]) && ($_POST["last"]) && ($_POST["userName"]) && ($_POST["email"]) && ($_POST["pwd"])) {
	$db = new dbQuery;

	$first     = $_POST['first'];
	$last      = $_POST['last'];
	$uid 	   = $_POST['userName'];
	$email     = $_POST['email'];
	$pwd   	   = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
	$superHash = sha1($uid.time());

	$db->signUp($first, $last, $uid, $email, $pwd, $superHash);
                    
    header('Location: /redemption/login/userLogIn.php?signup=success');
    exit();

}

?>