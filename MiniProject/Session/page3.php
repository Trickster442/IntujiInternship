<?php
session_start();
?>


<?php
session_destroy();

session_unset();

echo $_SESSION['favanimal'];



?>