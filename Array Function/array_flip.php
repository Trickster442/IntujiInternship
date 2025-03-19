<?php declare(strict_types=1); ?>

<!-- array_flip — Exchanges all keys with their associated values in an array
array_flip() returns an array in flip order, i.e. keys from array become values and values from array become keys. 
-->

<?php
$array = ['a' => 1, 'b' => 2, 'c' => 4];
$flipped = array_flip($array);

print_r($flipped);

?>