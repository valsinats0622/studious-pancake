<?php 
include_once("pdosql.php");
$stani = new pdosql();
$result = $stani->test();


foreach ($result as $value) {
$value["id"];
}


?>