<!-- md5_file — Calculates the md5 hash of a given file
Calculates the MD5 hash of the file specified by the filename parameter.
The hash is a 32-character hexadecimal number.
When true, returns the digest in raw binary format with a length of 16.


-->

<?php 
$file = readfile('./dummy.txt');
echo $file;

$fileHashed = md5_file('./dummy.txt');
echo "<br>" . $fileHashed;


?>