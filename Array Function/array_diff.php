<?php declare(strict_types=1); ?>

<!-- array_diff — Computes the difference of arrays
Compares array against one or more other arrays and returns the values in array 
that are not present in any of the other arrays. 
only returns the value that is not present in comparing array
-->

<?php
$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red", 'purple');
$result = array_diff($array1, $array2);

print_r($result);
?>

<?php
$source = [1, 2, 3, 4];
$filter = [3, 4, [5], 6];
$result = array_diff($filter, $source);

print_r($result);


?>