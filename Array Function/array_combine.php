<?php declare(strict_types=1); ?>

<!-- array_combine — Creates an array by using one array for keys and another for its values 
Creates an array by using the values from the keys array as keys and 
the values from the values array as the corresponding values.
If two keys are the same, the second one prevails.  
-->

<?php
$keys = ['a', 'b', 'c', 'd'];
$values = ['apple', 'ball', 'cat', 'dog'];

$combined =  array_combine($keys, $values);
print_r($combined);


?>