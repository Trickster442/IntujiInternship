<?php declare(strict_types= 1); ?>
<!-- array_diff_uassoc — Computes the difference of arrays with additional index 
 check which is performed by a user supplied callback function.

Compares array against arrays and returns the difference. 
Unlike array_diff() the array keys are used in the comparison. 
Unlike array_diff_assoc() a user supplied callback function 
is used for the indices comparison, not internal function.
-->

<?php
function compare_keys_values($a, $b){
    return $a <=> $b;
};

$array5 = ['a' => 'apple', 'b' => 'ball', 'c' => 'cat'];
$array6 = ['a' => 'apple' , 'e', 'f'];

print_r(array_diff_uassoc($array5, $array6, 'compare_keys'));

?>

<!-- Both keys and value should match, elements from first array not found in second array are returned -->