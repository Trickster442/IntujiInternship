<!-- html_entity_decode — Convert HTML entities to their corresponding characters -->

<?php 
$orig = "I'll \"walk\" the <b>dog</b> now";

$a = htmlentities($orig);
$b = html_entity_decode($a);

echo $a; 
echo "<br>";
echo $b; 

?>
