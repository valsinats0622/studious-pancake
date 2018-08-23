<?php
include_once("simple_html_dom.php");
error_reporting("E_All"); 

$url = "https://www.mediamarkt.se/sv/search.html?query=";
$search = $_POST["data"]["search"];
$tmparr = array();
$options = array(
	CURLOPT_URL => $url.$search,
	CURLOPT_HEADER => 0,
	CURLOPT_RETURNTRANSFER => 1
);

$ch = curl_init();
 
curl_setopt_array($ch, $options);

$result = curl_exec($ch);

$html = new simple_html_dom($result);

$parse = $html->find("dl.product-details");

foreach ($parse as $return) {
	$tmparr[] = $return->plaintext;
}

//var_dump($tmparr);

//$fuckurlencode = urldecode($tmparr);

/*$tmp = array();
foreach ($tmparr as $value) {
	$test = preg_replace('/\s+/', '', $value);
	echo $test."\r\n\r\n\r\n";
	//array_push($tmp, $explode);
}*/
//var_dump($tmp);
$json = json_encode($tmparr);

//var_dump($json);

echo $json;

echo "\r\n";

//var_dump($result);

curl_error($ch);

curl_close($ch);

?>