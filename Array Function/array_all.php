<?php declare(strict_types= 1); ?>

<!-- array_all — Checks if all array elements satisfy a callback function -->


<?php
$numbers = [1 , 2, 3, 4, 5];

var_dump(array_all($numbers , function ( $num) {
    return $num <= 5;
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

// Check, if all animal names are shorter than 12 letters.
var_dump(array_all($array, function (string $value) {
    return strlen($value) < 12;
}));

// Check, if all animal names are longer than 5 letters.
var_dump(array_all($array, function (string $value) {
    return strlen($value) > 5;
}));

// Check, if all array keys are strings.
var_dump(array_all($array, function (string $value, $key) {
   return is_string($key);
}));
?>