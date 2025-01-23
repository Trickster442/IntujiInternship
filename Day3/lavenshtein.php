<!-- levenshtein — Calculate Levenshtein distance between two strings 
The Levenshtein distance is defined as the minimal number of characters you have to replace, 
insert or delete to transform string1 into string2. 
The Levenshtein distance between two strings is the 
minimum number of edit operations needed to convert one string into the other.

For example, to transform the word "kitten" into "sitting":
"kitten" → "sitten" (substitute 'k' with 's')
"sitten" → "sittin" (delete 'e')
"sittin" → "sitting" (insert 'g')
-->

<?php
$str1 = "kitten";
$str2 = "sitting";

$distance = levenshtein($str1, $str2);
echo "Levenshtein distance between '$str1' and '$str2' is: $distance";
?>

?>

<!-- 
Spell Checking and Auto-correction: One of the most common applications of Levenshtein distance 
is in spell checking and autocorrection. 
When a user types a word that is misspelled, the algorithm can compare it against a dictionary of correct words and suggest 
the closest match by calculating the Levenshtein distance.

Example: If a user types "recieve" instead of "receive", the system can calculate the 
Levenshtein distance for all words in the dictionary and suggest the closest match ("receive" in this case).
 -->