<!-- hex2bin — Decodes a hexadecimally encoded binary string 
This function does NOT convert a hexadecimal number to a binary number. This can be done using the base_convert() function. 
If the hexadecimal input string is of odd length or invalid hexadecimal string an E_WARNING level error is thrown.
-->

<?php
$hex = hex2bin("6578616d706c65206865782064617461");
var_dump($hex);
echo "<br>";

$str = 'new string';
$bin_to_hex = bin2hex($str);
var_dump($bin_to_hex);
echo "<br>";

$hex_to_bin = hex2bin($bin_to_hex);
var_dump($hex_to_bin);


?>