<?php declare(strict_types= 1); ?>
<?php
$names = array(
    'first' => array('abc', 'def', 'ghi'),
    'last' => array('jkl', 'mno', 'pqr')
);

print_r($names);
echo '<br>';

// access 2nd element from first array
echo $names['first'][1];


// short cut to create array
$numbers = ['a', 'b', 'c', 'e'];
print_r($numbers);
?>