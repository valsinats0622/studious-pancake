<?php
	include_once("../dbQuery.php");

	if(isset($_POST["username"])){
		$db = new dbQuery;

		$userName = $_POST["username"];

		$stmt = $db->checkName($userName);

		$result = $stmt->fetchAll();

		$mail = $result[0]["email"];
		$uid  = $result[0]["id"];  
		$url_key = sha1($_POST["username"].time());

		$db->tempKey($uid, $url_key);
		
		// the message
		$fullMsg = "To reset password click this link " . $url;

		$url = "http://stanislav.test/redemption/changePwd.php?resetKey=".$url_key;
		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($fullMsg,70);

		// send email
		mail($mail,"My subject",$msg);
		
		header('Location: /redemption/resetPwdFolder/resetPwd.php?');
    	exit();
	}
?>