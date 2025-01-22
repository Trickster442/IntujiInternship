<?php
// this function is used to provide corresponding String Character from a number
// for example chr(65) gives A


echo chr(245);

for ($i = 65; $i <= 90; $i++) {
    echo chr($i) . " ";  
}
// An integer between 0 and 255.

// Values outside the valid range (0..255) will be bitwise and'ed with 255, which is equivalent to the following algorithm:
?>

<?php
$str = chr(240) . chr(159) . chr(144) . chr(152);
echo $str;
?>

<!--  It's often used when dealing with low-level string manipulation or encoding tasks in PHP. -->