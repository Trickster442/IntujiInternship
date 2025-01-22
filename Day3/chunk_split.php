<?php declare(strict_types= 1);?>

<!-- chunk_split — Split a string into smaller chunks -->
<!-- 
Can be used to split a string into smaller chunks which is useful for e.g. 
converting base64_encode() output to match RFC 2045 semantics. It inserts separator every length characters. 
-->

<?php
$name = 'Sandip';
echo chunk_split($name, 1, ' <br> ');
?>

<?php
$data = "Hello World, How are you ?";
echo chunk_split($data, 5, "\r <br>");

?>

<!-- When encoding binary data to base64, it's important to split the output into 
 smaller lines (e.g., 76 characters per line) 
 for compatibility with email formats. chunk_split() is ideal for this: 
Sometimes email subject lines can be too long, and breaking them into shorter lines for readability is helpful.
    -->