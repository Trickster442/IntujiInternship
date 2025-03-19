<?php declare(strict_types= 1); ?>

<?php
// read all content from file
echo readfile("./webdictionary.txt");
echo "<br>";

// fopen()
$read = fopen('./webdictionary.txt', 'r') or die('Unable to open the file');

// read the file fread() second parameter defines how much byte to read
// after it read, the pointer goes to where it end and starts from there the next time you read
echo fread($read,100);
echo "<br>";
echo fread($read,filesize('webdictionary.txt'));
echo '<br>';


// fgets() - read single line
$read2 = fopen('./webdictionary.txt', 'r') or die('Unable to open the file');
echo fgets($read2);
echo '<br>';
echo fgets($read2);
echo '<br>';


// feof() - end of file
$read3 = fopen('webdictionary.txt', 'r') or die("Unable to open the file");
// Output one line until end-of-file
while(!feof($read3)) {
  echo fgets($read3) . "<br>";
}


// fgetc() - read single character until end
$read4 = fopen('webdictionary.txt', 'r') or die('Unable to open file!');
// Output one character until end-of-file
while(!feof($read4)) {
  echo fgetc($read4) . ' , ';
}


// write file
$write1 = fopen('newfile.txt', 'w') or die('Unable to create a file');
$txt = "Hello world \n";
fwrite( $write1, $txt);
fwrite( $write1, $txt);

// append to file
$append1 = fopen("newfile.txt", "a") or die("Unable to open a file");
$txt2 = "Hello Hello \n";
fwrite( $append1, $txt2);
fwrite( $append1, $txt2);

// close the opened file 
fclose($read);
fclose($read2);
fclose($read3);
fclose($read4);
fclose($write1);


?>
