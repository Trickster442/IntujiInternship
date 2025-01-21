<?php declare(strict_types= 1); ?>

<?php

// Regular function
function addNumbers(int $a, int $b) : int 
{
    return $a + $b;
}
echo addNumbers(1, 5);
echo "<br>";

// Arrow Function
$add = fn(int $a, int $b) : int => $a + $b;
echo $add(5,2);
echo "<br>";

//Anonymous function
$add2 = function(int $a, int $b) {
    return $a + $b;
};

echo $add2(9,11);