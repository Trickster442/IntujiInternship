<?php declare(strict_types= 1); ?>
<!-- array_fill — Fill an array with values
Fills an array with count entries of the value 
of the value parameter, keys starting at the start_index parameter.
-->

<?php

$normal_fill = array_fill(3, 3, 'hello');
print_r($normal_fill);
echo '<br>';

$neg_fill = array_fill(-2, 5, 'world');
print_r($neg_fill);
echo '<br>';

$nested_fill = array_fill(0, 10, array_fill(0, 10, 0));
print_r($nested_fill);
?>