<!-- crc32 is a hash function to generate a 32 bit checksum of data
checksum = numerical representation
It is commonly used for detecting errors in data transmission or storage,
ensuring the integrity of data, and as a simple checksum mechanism for verifying 
the consistency of files or data. 
-->

<?php 
$quote = 'The quick brown fox jumped over the lazy dog.';
$encryptCRC32 = crc32($quote);
echo $encryptCRC32 . "<br>";
$decryptCRC32 = crc32($encryptCRC32);
echo $decryptCRC32 . "<br>";