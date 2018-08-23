<?php
include_once("simple_html_dom.php"); 
error_reporting("E_All"); 

$ch = curl_init();

$word = urlencode($_POST['data']['input']); 
$url  = "https://www.synonymer.se/sv-syn/";
$fetched = array();
$options = array( 
	CURLOPT_URL => $url.$word,
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_HEADER => 0
);

curl_setopt_array($ch, $options);

$result = curl_exec($ch);

$html = new simple_html_dom($result);

$toSearch = $html->find('div#dict-default ul');

foreach ($toSearch as $ul) {
	foreach ($ul->find("li") as $value) {
		$fetched[] = $value->plaintext;	
	}	
}

$synonym = explode(", ", $fetched[1]);
$motsats = explode(", ", $fetched[2]);

$json = json_encode($synonym);

echo $json;

echo "\r\n";

curl_error($result);

curl_close($ch);




?>
