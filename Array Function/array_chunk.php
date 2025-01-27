<?php declare(strict_types=1); ?>
<!-- array_chunk — Split an array into chunks
Chunks an array into arrays with length elements. 
The last chunk may contain less than length elements. 
preserve_keys
When set to true keys will be preserved. Default is false which will reindex the chunk numerically
-->


<?php 
$numbers = [1,2,3,4,5,6,7,8,9];
print_r(array_chunk($numbers,3));
echo "<br>";
print_r($numbers);
echo "<br>";
print_r(array_chunk($numbers,3, true));
echo "<br>";
print_r($numbers);
?>