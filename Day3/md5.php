<!-- md5 — Calculate the md5 hash of a string
It is not recommended to use this function to secure passwords, due to the fast nature of this hashing algorithm.
If the optional binary is set to true, then the md5 digest is instead returned in raw binary format with a length of 16. 
Returns the hash as a 32-character hexadecimal number.
-->

<?php 
$str = 'apple';
$hashedMd5 = md5($str);
$hashed16 = md5($str, true);
echo $hashedMd5;
echo "<br>" . $hashed16;

?>