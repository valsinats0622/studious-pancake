<?php
include_once("simple_html_dom.php");
error_reporting("E_All"); 


$ch = curl_init() ;
$input = $_POST['data']['input'];
$url   = "https://www.allabolag.se/what/".$input;
$temparr = array();
$options = array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_HEADER => 0
);

curl_setopt_array($ch, $options);

$result = curl_exec($ch);
$html = new simple_html_dom($result);

$tmp = array();
$parse = $html->find("article.box");

foreach($html->find('div.search-results__item__text') as $div) {
	
	$title = trim($div->children(0)->plaintext);
   	$fill = array();
	$exp = explode("Org.nummer", $div->children(2)->plaintext);
	$exp2 = explode("Verksamhet", $exp[1]);
	$fill["orgnr"] = trim($exp2[0]);
	$fill["verksamhet"] = trim($exp2[1]);
	$fill["title"] = $title;
	array_push($temparr, $fill);
}
var_dump($temparr);
curl_close($ch);

?>

