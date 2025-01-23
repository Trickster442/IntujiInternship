<?php declare(strict_types= 1);?>

<!-- implode — Join array elements with a string 
takes an array and return string with separator added after each elements 
-->
<?php 
$array = ['S', 'A', 'N', 'D', 'I', 'P'];
$imploded = implode(',', $array);  // S,A,N,D,I,P
$imploded2 = implode('', $array);  // SANDIP

echo $imploded; 
echo "<br>" . $imploded2 ;

?>

<!-- join — Alias of implode() -->