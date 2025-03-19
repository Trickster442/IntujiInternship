<?php declare(strict_types= 1);?>


<?php
$filename = 'bar.txt';

$file = fopen($filename, 'r+');
rewind($file);
fwrite($file, 'Too');
// fflush($file);
ftruncate($file, ftell($file));
fclose($file);
?>