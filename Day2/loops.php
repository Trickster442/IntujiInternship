<?php declare(strict_types= 1); ?>

 <!-- for loop / until when -->
<?php


for ($x = 0; $x <= 100; $x += 10) {
    echo 'The number is: ' . $x .'<br>';
}
?>

<!-- // foreach loop // through array -->
<?php

$members = ['Name' => 'Sandip', 'Last Name' => 'Magar', 'Age' => '21'];

foreach ($members as $x => $y) {
    echo "$x : $y <br>";
}

?>

<!-- While Loop / only if the condition is true -->
<?php
$i = 1;
while ($i < 6) {
    echo $i . "<br>";
    $i++;
}

?>

<!-- Do While / run once even if the condition is false -->
<?php
$a = 0;

do {
    echo $a .'<br>';
    $a++;
} while ($a < 5);

?>