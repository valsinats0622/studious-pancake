<?php 
include_once("db.php");
error_reporting("E_ALL");
ini_set('display_errors', 1);

class dbQuery extends pdodb {

	public function Query ($system, $matter, $description) {

		$params = array(
			'system'      => $system, 
			'matter'      => $matter, 
			'description' => $description
		);

			var_dump($params);

		$sql = "INSERT INTO complaints (system, matter, description) VALUES (:system, :matter, :description)";
		echo "1";
		$this->runinsert($sql, $params);
		echo "2";

	}

	public function getMessages() {

		$sql  = "SELECT * FROM `complaints`";

		$stmt = $this->run($sql);

		return $stmt;

	}

	public function filterInbox($sql) {


		//$sql = "SELECT * FROM complaints";

		$params = null;
		$stmt = $this->run($sql, $params);

		return $stmt; 

	}

	public function checkName($userName) {
		$params = array(
			'userName' => $userName
		);

 		$sql  = "SELECT * FROM users WHERE userName=:userName";
 	
		$stmt = $this->run($sql,$params);

		return $stmt;
	}

	public function uniqueMail($email) {
		$params = array(
			'mail' => $email
		);

 		$sql  = "SELECT * FROM users WHERE email=:mail";
 	
		$stmt = $this->run($sql,$params);

		return $stmt;
	}

	public function signUp ($first, $last, $uid, $email, $pwd, $superHash){

		$params = array( 
			'first' 	=> $first,
			'last' 		=> $last,
			'uid' 		=> $uid,
			'email' 	=> $email,
			'pwd' 		=> $pwd,
			'superHash' => $superHash
		);

	$sql = "INSERT INTO users (firstName, lastName, userName, email, pwd, superHash) VALUES (:first, :last, :uid, :email, :pwd, :superHash)";	

	$stmt = $this->runinsert($sql, $params);

	}

	public function login($uid) {
	
		$params = array(
			'userName' => $uid,
			'email' => $uid
		);
	
		$sql  = "SELECT * FROM users WHERE userName=:userName OR email=:email";
	
		$stmt = $this->run($sql,$params);

		return $stmt;
	}

	public function updatePwd($pwd, $email){

		$params = array(
			'hashedPwd' => $pwd,
			'mail' => $email
		);

		$sql  = 'UPDATE users SET pwd =:hashedPwd WHERE email =:mail';

		$stmt = $this->run($sql, $params);

		return $stmt; 

	}

	public function tempKey($uid, $url_key){

		$params = array(
			'key' => $url_key,
			'uid' => $uid
		);

		$sql = "INSERT INTO reset_Pwd (user_id, user_resetkey) VALUES (:uid, :key)";

		$stmt = $this->runinsert($sql, $params);

	}

	public function createCookie($userName){
		$userCookie = sha1("testSecret", $userName);

		//$expire = time() + 900; 

		setcookie("rememberUserCookie", $userCookie, "/");

		$params = array('cookie' => $userCookie);

		//if(isset($_COOKIE["rememberUserCookie"])){
			//$sql = "INSERT INTO auth_token (hashedValidation) VALUES (:cookie)";

			//$stmt = $this->runinsert($sql, $params);
		//}
	}
}
?>
