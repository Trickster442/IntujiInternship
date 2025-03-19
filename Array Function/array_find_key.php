<?php declare(strict_types=1); ?>

<!-- array_find_key — Returns the key of the first element satisfying a callback function
array_find_key() returns the key of the first element of an array for which the given callback returns true. 
If no matching element is found the function returns null. 
-->

<?php
$array = [
    'a' => 'dog',
    'b' => 'cat',
    'c' => 'cow',
    'd' => 'duck',
    'e' => 'goose',
    'f' => 'elephant'
];

print_r(array_find_key($array, function ($value){
    return $value == 'dog';
}));

?>

<?php
$array = [
    'a' => 'dog',
    'b' => 'cat',
    'c' => 'cow',
    'd' => 'duck',
    'e' => 'goose',
    'f' => 'elephant'
];

// Find the first animal with a name longer than 4 characters.
var_dump(array_find_key($array, function (string $value) {
    return strlen($value) > 4;
}));

// Find the first animal whose name begins with f.
var_dump(array_find_key($array, function (string $value) {
    return str_starts_with($value, 'f');
}));

?>