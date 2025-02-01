<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validation</title>
    <link rel="stylesheet" href="./password_checker.css">
</head>

<body>
<div class="container">
    <form method="post">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
        <button type="submit" name="submit">Submit</button> 
    </form>

    <div class="error-notification" id="errorNotification">
        Password did not meet the requirements. It must contain at least 1 uppercase, 1 lowercase, 1 special character, 1 number, and be at least 8 characters long.
    </div>

    <div class="result">
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            check_password();
        }
        ?>
    </div>
</div>
</body>
</html>



<?php
function check_password() {
    $password = $_POST['password'];

            $upperCaseSearch = preg_match_all('/[A-Z]/', $password);
            $lowerCaseSearch = preg_match_all('/[a-z]/', $password);
            $numericalChar = preg_match_all('/[0-9]/', $password);
            $specialChar = preg_match_all('/[\*\!\#\@\$\%\^\&\(\)\+\=\_\-]/', $password);

            // Check password criteria
            if (strlen($password) < 8 || $upperCaseSearch < 1 || $lowerCaseSearch < 1 || $numericalChar < 1 || $specialChar < 1) {
                echo '<script>
                        document.getElementById("errorNotification").style.display = "block";
                        document.getElementById("password").focus();
                      </script>';
            } else if (strlen($password) >= 8 && strlen($password) <= 10) {
                if ($upperCaseSearch == 1 && $numericalChar == 1 && $specialChar == 1) {
                    echo '<span class="weak">Password is weak</span>';
                } else if ($upperCaseSearch == 2 || $numericalChar == 2 || $specialChar == 2) {
                    echo '<span class="moderate">Password is moderate</span>';
                } else if ($upperCaseSearch > 2 || $numericalChar > 2 || $specialChar > 2) {
                    echo '<span class="success">Password is strong</span>';
                }
            } else {
                echo '<span class="success">Password is very strong</span>';
            }
}

?>