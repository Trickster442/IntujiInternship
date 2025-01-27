<?php declare(strict_types=1); ?>

<!-- array_change_key_case — Changes the case of all keys in an array
Returns an array with all keys from array lowercased or uppercased. 
Numbered indices are left as is. 
-->

<?php 
$names = [
    'first' => ['abc' , 'def' , 'ghi'],
    'last' => ['jkl' , 'mno' , 'pqr']
];

print_r(array_change_key_case($names , CASE_UPPER)); 


?>