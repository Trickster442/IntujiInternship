<?php declare(strict_types= 1); ?>

<!-- array_all — Checks if all array elements satisfy a callback function -->


<?php
$numbers = [1 , 2, 3, 4, 5];
var_dump(array_all($numbers , function (int $num) {
    return $num <= 5;
}));


