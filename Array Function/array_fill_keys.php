<?php declare(strict_types= 1); ?>

<!-- array_fill_keys — Fill an array with values, specifying keys 
keys
Array of values that will be used as keys. 
Illegal values for key will be converted to string.

value
Value to use for filling 
-->

<?php
$keys = ['a', 'b', 'c', 'd', 'e'];
$values = ['apple', 'ball', 'cat', 'dog'];
$value = ['hello'];

$new_array1 = array_fill_keys($keys, $values);
print_r($new_array1);
echo '<br>';
echo '<br>';

$new_array2 = array_fill_keys($keys,$value);
print_r($new_array2);

?>