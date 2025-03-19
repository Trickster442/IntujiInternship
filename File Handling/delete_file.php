<?php declare(strict_types= 1); ?>

<!-- There is no delete keyword or function in the PHP language. 
To delete a file, try unlink(). To delete a variable from the local scope, check out unset(). -->
<?php
if (!unlink('copy_file.txt')) {
    echo 'Unable to delete the file';
};
unlink('copy_file.txt');


?>


 <!-- dirname() Returns a parent directory's path -->

<?php
echo dirname(__FILE__);

?>
