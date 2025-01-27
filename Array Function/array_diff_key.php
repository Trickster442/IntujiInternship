<?php declare(strict_types=1); ?>

<!-- array_diff_key — Computes the difference of arrays using keys for comparison
Compares the keys from array against the keys from arrays and returns the difference. 
This function is like array_diff() except the comparison is done on the keys instead of the values. 
-->

<?php
$fruits1 = ['apple' => 5, 'grapes' => 10, 'oranges' => 2];
$fruits2 = ['apple' => 2, 'watermelon'=> '2', ];

print_r(array_diff_key($fruits1, $fruits2));


?>


<!-- This function only checks one dimension of a n-dimensional array.
Of course you can check deeper dimensions by using array_diff_key($array1[0], $array2[0]);. -->