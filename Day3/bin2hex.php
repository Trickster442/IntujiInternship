<?php declare(strict_types= 1); ?>
<?php
// bin2hex function is to Convert binary data into hexadecimal representation
// hex2bin function is to convert hex data into String (string are in binary originally)

$str = "Hello";
echo $str . "<br>";
$hexStr = bin2hex($str);
echo $hexStr ."<br>";
$binStr = hex2bin($hexStr);
echo $binStr ."<br>";

