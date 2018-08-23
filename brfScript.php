<?php
error_reporting("E_ALL");
ini_set('display_errors', 1);

include_once("simple_html_dom.php"); 
include_once("db/dbQuery.php");

if(isset($_POST["action"])){
	switch($_POST["action"]){
		case "search":
			getLinks($_POST["data"]["search"]);
		break;
		case "getbrf":
			getData($_POST["url"], $_POST["numb"], $_POST["brfname"]);
		break;
	}
}

function getLinks($input){
	$ch = curl_init();
	$input = urlencode($input);
	//$input = urlencode(/*$_POST["data"]["info"]*/"ingenjören 4");
	$url = "https://www.allabrf.se/items/summaries?query=".$input;
	$fetched = array();
	$options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_HEADER => 0
	); 

	curl_setopt_array($ch, $options);

	$result = curl_exec($ch);

	//var_dump($result);

	$json = json_decode($result,true);

	$links = [];

	foreach ($json["organizations"] as $value) {
		$url     = $value["id"];
		$name    = $value["name"];
		$orgNumb = $value["org_number"];
		
		$links[] = [
			'id'   => $url,
			'name' => $name,
			'numb' => $orgNumb
		];

	};	

	$jsontest = json_encode($links);

	echo($jsontest);

	curl_close($ch);
}

/*

1. Kolla ifall föreningen finns i databasen

2. Finns den i databasen, hämta infon

3. Om inte kör en curl

4. Spara i databasen

5. Hämta upp datan ur databasen

*/

function getData($url, $numb, $brfname){

	// här sparar vi datan till databasen

	$dbQ = new dbQuery();

	$stmt = $dbQ->isRecord($numb);
	$result = $stmt->fetchAll();
	//var_dump($result);

	if(count($result)==0){
		$ch = curl_init();
		$fullUrl = "https://allabrf.se/" .$url;

		$options = array(
			CURLOPT_URL => $fullUrl,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_HEADER => 0  
		);

		curl_setopt_array($ch, $options);

		$result = curl_exec($ch);

		//var_dump($result);

		$html = new simple_html_dom($result);

		$brfArray = array();

		// först hämtar vi ut grunddatan
		foreach ($html->find('div.grid__item--leftthird table tr') as $div) {
			//echo $div."\n";
			$labels = $div->find("th");
			$values = $div->find("td");

			$tmplbl = "";
			$tmpval = "";
			$tmpArr = array();

			foreach ($labels as $lbl) {
				$tmplbl = $lbl->plaintext;
			}

			foreach ($values as $val) {
				$tmpval = $val->plaintext;
			}

			if($tmplbl != ""){
				$brfArray[$tmplbl] = $tmpval;

				//array_push($brfArray, $tmpArr);
			}
		}

		foreach ($html->find('.slider__result #slider_value') as $div) {
			$node = $div->attr;

			$brfArray["Årsavgift per kvm"] = $node["data-fee-per-m2"];
		}

		$dbQ->saveData($brfname, $brfArray["Organisationsnr"], $brfArray["Registreringsår"], $brfArray["Kommun"], $brfArray["Status"], $brfArray["Antal lägenheter"] ,$brfArray["Antal följare"], $brfArray["Senast uppdaterad"], $brfArray["Årsavgift per kvm"]);

		$stmt = $dbQ->isRecord($numb);
		$result = $stmt->fetchAll();
		$jsonD = json_encode($result, true);

		//var_dump($jsonD);
		/*
		[{"id":20,"orgNr":"702002-8275","registrering_ar":1970,"komun":"Stockholm","status":"\u00c4kta","lagenheter":102,"foljare":5,"uppdaterad":"24 juni 2018","avgiftKm":572,"timestamp":"2018-08-01 23:47:36"}]
		*/
	
		echo $jsonD;
		curl_close($ch);
	} else {
		$jsonD = json_encode($result,true);
		echo $jsonD;
	}
	
}

?>