<?php
echo "Display users";
echo '<br>';

?>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php
    foreach ($users as $user) {
        echo '
        <tr>
            <td> ' . $user->name . '</td>
            <td> ' . $user->email . '</td>
            <td> ' . $user->password . '</td>
        </tr>
        ';
    }
    ?>
</table>