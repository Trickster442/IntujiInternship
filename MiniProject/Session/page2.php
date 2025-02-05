<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
echo $_SESSION['favanimal'] . $_SESSION['favcolor'];
?>

</body>
</html>