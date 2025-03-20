<h1>Student list page</h1>
<?php
foreach ($data as $student) {
    echo $student->name . ' ' . $student->email . ' ' . $student->batch . '<br>';
}
