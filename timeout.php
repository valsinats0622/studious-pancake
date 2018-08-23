<?php
session_start();

$afkTimer = time() - $_SESSION["time"];
$fifteenMins = 60 * 15;

if($fifteenMins < $afkTimer){
	session_unset();
	session_destroy();
	echo 1;
} else {
	echo 0;
}

?>