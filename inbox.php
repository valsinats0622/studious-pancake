
<?php 
include_once 'dbQuery.php';
	$function = new dbQuery();
	$stmt     = $function->getMessages();
	$result   = $stmt->fetchAll();
	echo '<div class="col-12" style="overflow: auto;" oncontextmenu="return false;">'; 
			foreach ($result as $value) {
				//var_dump($value);
				echo '<div class="inbox" style="border-top: solid 1px #000000; border-botton: solid 1px #000000;">';
				echo '<div class="message_box" data-msgid="' . $value["id"] . '">';
				echo("System: " . $value["system"]);
				echo("<br/>");
				echo("Matter: " . $value["matter"]);
				echo("<br/>");

				$numwords = 10;

				$myMessage = $value["description"];
				preg_match("/(\S+\s*){0,$numwords}/", $myMessage, $regs);
				$shortdesc = trim($regs[0]);

				$maxChars = 40;

				if(strlen($shortdesc)>$maxChars){
					$shortdesc = substr($shortdesc, 0,$maxChars) . "...";
				}

				echo("Meddelande: " . $shortdesc);
				echo("<br/>");
				echo("Time sent: " . $value["timeSent"]);
				echo "</div>";
				echo "</div>";
			}
		
	echo '</div>';
?>