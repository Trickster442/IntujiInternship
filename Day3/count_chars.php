<!-- count_chars — Return information about characters used in a string
Counts the number of occurrences of every byte-value (0..255) in string and returns it in various ways.
mode = 0 - an array with the byte-value as key and the frequency of every byte as value. 
1 - same as 0 but only byte-values with a frequency greater than zero are listed.
2 - same as 0 but only byte-values with a frequency equal to zero are listed.
3 - a string containing all unique characters is returned.
4 - a string containing all unused characters is returned.
-->

<?php
// mode - 0
$dummyStr = "abbcdg";

echo count_chars($dummyStr, 3) ." ";


?>