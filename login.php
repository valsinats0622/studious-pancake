<?php
	error_reporting("E_ALL");
	ini_set('display_errors', 1);
	session_start();
	include '../dbQuery.php';

if (isset($_POST['submit']) && isset($_POST["uid"]) && isset($_POST["pwd"])) {
	
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];

	$db = new dbQuery();

	if ( empty($uid) || empty($pwd) ) {
	
		header("Location: /redemption/login/userLogIn.php?login=empty");
	    exit();
	} else {
		$stmt        = $db->login($uid);	
		$result      = $stmt->FetchAll();
		$resultCheck = count($result);

        if ($resultCheck < 1) {
        	
			header("Location: /redemption/login/userLogIn.php?login=error");
	        exit();
	    } else {

        	$hashedPwdChack = password_verify($pwd, $result[0]['pwd']);

        	if ($hashedPwdChack == false) {
        	
        		header("Location: /redemption/login/userLogIn.php?login=error");
                exit();
            } elseif ($hashedPwdChack == true) {
            	$_SESSION['id']    		= $result[0]['id'];
            	$_SESSION['firstName'] 	= $result[0]['firstName'];
            	$_SESSION['lastName']  	= $result[0]['lastName'];
            	$_SESSION['email'] 		= $result[0]['email'];
            	$_SESSION['userName']   = $result[0]['userName'];
            	$_SESSION['time'] 		= time();

            	//$db->createCookie($uid);

            	header("Location: /redemption/form.php?login=success");
                //header("refresh: 5; url=/redemption/form.php?login=success");

                exit();
            }
        }
	}
} else {
	echo "6";
	header("Location: /redemption/index.php?login=error");
	exit();
} ?>