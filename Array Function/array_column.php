<?php declare(strict_types= 1); ?>
<!-- array_column — Return the values from a single column in the input array
array_column() returns the values from a single column of the array, identified by the column_key. 
Optionally, an index_key may be provided to index the values in the returned array by the values from 
the index_key column of the input array. 
-->

<?php 
$user_records = [
    'first' => [
        'id' => 1,
        'firstname' => 'Sandip',
        'lastname' => 'Magar'
    ],
    'second' => [
        'id' => 2,
        'firstname' => 'Blah',
        'lastname' => 'Blah'
    ],
    'third' => [
        'id'=> 3,
        'firstname'=> 'Hello',
        'lastname' => 'World'
    ]
    ];


print_r(array_column($user_records,'firstname', 'id'));
echo '<br>';
print_r(array_change_key_case($user_records, CASE_UPPER));
?>
