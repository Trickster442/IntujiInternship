<?php declare(strict_types= 1); ?>

<!-- array_filter — Filters elements of an array using a callback function
Iterates over each value in the array passing them to the callback function. 
If the callback function returns true, the current value from array is returned into the result array. 

-->

<?php

function odd($var)
{
    // returns whether the input integer is odd
    return $var & 1;
}

function even($var)
{
    // returns whether the input integer is even
    return !($var & 1);
}

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Odd :";
print_r(array_filter($array1, "odd"));
echo '<br>';
echo "Even:";
print_r(array_filter($array2, "even"));
echo "<br>";
?>

<?php 
function lessThanFive($var){
    return $var < 5;
}

$array3 = [1,2,3,4,5,6,7,8,9,10,11,12];
print_r(array_filter($array3, "lessThanFive"));
echo '<br>';

$array4 = [1,2,3,4,5,6,7,8,9,10,11,12];
print_r(array_filter($array4, function($var){
    return $var > 5 ;
}));
echo '<br>';

?>


<?php

$arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4];

var_dump(array_filter($arr, function($k) {
    return $k == 'b';
}, ARRAY_FILTER_USE_KEY));
echo '<br>';
var_dump(array_filter($arr, function($v, $k) {
    return $k == 'b' || $v == 4;
}, ARRAY_FILTER_USE_BOTH));
?>