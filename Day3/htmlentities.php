<?php declare(strict_types= 1); ?>
<!-- htmlentities — Convert all applicable characters to HTML entities 
htmlentities(
    string $string,
    int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
    ?string $encoding = null,
    bool $double_encode = true
): string 
-->

<?php
$str = "The < and & characters are special.";
$encode = htmlentities($str, ENT_XML1, 'UTF-8');
echo $encode;
?>
