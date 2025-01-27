<?php declare(strict_types= 1); ?>

<!-- array_count_values — Counts the occurrences of each distinct value in an array
 array_count_values() returns an array using the values of array 
 (which must be ints or strings) as keys and their frequency in array as values. -->


<?php 
$dummy = array(1, 'a', 'b', 'a', 1, 'a' );

print_r( array_count_values( $dummy) ) ;
echo '<br>';

// count the frequency of a values
print_r( array_count_values( $dummy)['a'] ) ;
echo "<br>";
?>

<?php

$list = [
  ['id' => 1, 'userId' => 5],
  ['id' => 2, 'userId' => 5],
  ['id' => 3, 'userId' => 6],
];
$userId = 5;

echo array_count_values(array_column($list, 'userId'))[$userId]; 
?>