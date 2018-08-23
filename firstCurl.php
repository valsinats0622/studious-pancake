<?php 

$ch = curl_init();
error_reporting("E_All"); 

curl_setopt($ch, CURLOPT_URL, "https://www.google.se/");
curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FILETIME, 1);

curl_exec($ch);

curl_close($ch);


?>