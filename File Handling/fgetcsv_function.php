<?php declare(strict_types=1); ?>

<?php
$row = 1;
if (($handle = fopen("student_grade.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}

$csv_file = fopen("student_grade.csv","r") or die('Unable to open file');
while (($data = fgetcsv($csv_file)) !== false) {
    print_r($data); // Print each row as an array
}
fclose($csv_file);