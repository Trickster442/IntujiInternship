<!-- ltrim — Strip whitespace (or other characters) from the beginning of a string 
Without the second parameter, mb_ltrim() will strip these characters:

" ": ASCII SP character 0x20, an ordinary space.
"\t": ASCII HT character 0x09, a tab.
"\n": ASCII LF character 0x0A, a new line (line feed).
"\r": ASCII CR character 0x0D, a carriage return.
"\0": ASCII NUL character 0x00, the NUL-byte.
"\v": ASCII VT character 0x0B, a vertical tab.
-->

<?php
$text = "Hello   World!!!";
$trimmed = ltrim($text);
$trimmed2 = ltrim($text,"H");
echo $trimmed;
echo "<br>". $trimmed2;


?>