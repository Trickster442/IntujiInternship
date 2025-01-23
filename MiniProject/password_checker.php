<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1.1em;
            font-weight: bold;
            color: #333;
        }

        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            font-size: 1.1em;
            font-weight: bold;
            color: #d9534f;
        }

        /* Success color */
        .result.success {
            color: #5bc0de;
        }
        /* Moderate password color */
        .result.moderate {
            color: #f0ad4e;
        }
        /* Weak password color */
        .result.weak {
            color: #d9534f;
        }

        /* Added some spacing for the error notification */
        .error-notification {
            color: #d9534f;
            font-weight: bold;
            margin-top: 15px;
            padding: 10px;
            background-color: #f8d7da;
            border-radius: 4px;
            border: 1px solid #f5c6cb;
            display: none;
        }

    </style>
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
    </div>
</div>
</body>
</html>
