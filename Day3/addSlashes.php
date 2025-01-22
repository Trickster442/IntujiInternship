<?php
// addSlashes function is used to add slashes before characters like 
// single quote ('')
// double quote ("")
// backslash (\)
// NULL (The Nul byte)
// available in a strings

$str = 'O\'Reilly?';    // O'Reilly
echo addslashes( $str );  // O\'Reilly?
echo '<br>';

$doubleQuoteString = "\"Php\" stands for Hypertext Preprocessor"; // "PHP" stands for Hypertext Preprocessor
echo addslashes( $doubleQuoteString );  // \"Php\" stands for Hypertext Preprocessor
echo "<br>";

$backslashStr = '\\PHP\\ stands for Hypertext Preprocessor'; // /PHP stands for HYPERTEXT PREPROCESSOR
echo addslashes( $backslashStr ); // \\PHP\\ stands for Hypertext Preprocessor
echo '<br>';
// The NUL byte (represented as "\0") is a special character in PHP that signifies the end of a string in many programming languages.
$nullStr = "Hello \0 World";
echo $nullStr ."<br>";
echo addslashes($nullStr);

// Use cases for addslashes function
// The addslashes() is sometimes incorrectly used to try to prevent SQL Injection. Instead, database-specific escaping functions and/or prepared statements should be used.