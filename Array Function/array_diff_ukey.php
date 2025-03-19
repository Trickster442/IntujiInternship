<?php declare(strict_types=1); ?>

<!-- array_diff_ukey — Computes the difference of arrays using a callback function on the keys for comparison
Compares the keys from array against the keys from arrays and returns the difference. 
This function is like array_diff() except the comparison is done on the keys instead of the values. 

Unlike array_diff_key() a user supplied callback function is used for the indices comparison, not internal function.
-->

<?php
function compare_keys($a, $b){
    return $a <=> $b;
};

$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

var_dump(array_diff_ukey($array1, $array2, 'compare_keys'));


?>
