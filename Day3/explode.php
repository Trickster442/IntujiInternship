<!-- explode — Split a string by a string 
Returns an array of strings, each of which is a 
substring of string formed by splitting it on boundaries formed by the string separator. 
-->

<?php
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // piece1
echo "<br>";
echo $pieces[4]; // piece2
echo "<br>";

$input1 = "hello";
$input2 = "hello,there";
$input3 = ',';
var_dump( explode( ',', $input1 ) );
var_dump( explode( ',', $input2 ) );
var_dump( explode( ',', $input3 ) );

echo "<br>";
$str = 'one|two|three|four';

// positive limit
print_r(explode('|', $str, 2));
echo "<br>";
// negative limit
print_r(explode('|', $str, -1));
?>