<!-- convert_uudecode — Decode a uuencoded string 
Returns the decoded data as a string or false on failure.
Parameters - The uuencoded data. 

convert_uuencode — Uuencode a string
Uuencode translates all strings (including binary data) into printable characters,
making them safe for network transmissions. Uuencoded data is about 35% larger than the original.
-->

<?php
$orgStr = 'Hello World';
$encodedStr = convert_uuencode($orgStr);
echo $encodedStr . "<br>";

$decodedStr = convert_uudecode($encodedStr);
echo $decodedStr ."<br>";

?>