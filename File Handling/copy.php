<?php declare(strict_types= 1); ?>


<?php
$read_file = 'newfile.txt';

if (!copy($read_file, 'copy_file.txt')) {
    echo "failed to copy ...\n";
}
copy($read_file,"copy_file.txt");
echo 'Successfully copied';


?>