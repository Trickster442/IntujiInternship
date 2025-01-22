<?php
// chop — Alias of rtrim()
// removes the last character in the string.
$str = "Hello World!! \"";
$chopStr = chop($str, "\"");
echo ($str) . "<br>";
echo $chopStr;

// Rather use rtrim(). Usage of chop() is not very clear nor consistent for people reading the code after you.
