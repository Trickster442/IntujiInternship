<?php declare(strict_types= 1); ?>
<!-- array_diff_assoc — Computes the difference of arrays with additional index check
Compares array against arrays and returns the difference. 
Unlike array_diff() the array keys are also used in the comparison. 
-->

<?php
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");
$result = array_diff_assoc($array1, $array2);
print_r($result);
echo '<br>';
$result2 = array_diff_assoc($array2, $array1);
print_r($result2);

?>