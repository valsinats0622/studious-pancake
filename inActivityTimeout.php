<?php
session_start();

$InActiveTimer = time() - $_SESSION["time"];
$setTime = 60 * 1;

if($setTime < $InActiveTimer){
	session_unset();
	session_destroy();
	echo 1;
} else {
	echo 0;
}
?>