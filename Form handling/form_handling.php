<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['name']) && isset($_POST['email'])){
        echo $_POST['name'] . ' ' . $_POST['email'] . '<br>';
    }
}



?>