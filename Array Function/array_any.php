<?php declare(strict_types= 1);?>

<?php
$array = [
    'a' => 'dog',
    'b' => 'cat',
    'c' => 'cow',
    'd' => 'duck',
    'e' => 'goose',
    'f' => 'elephant'
];

// Check, if any animal name is longer than 5 letters.
var_dump(array_any($array, function (string $value) {
    return strlen($value) > 5;
}));