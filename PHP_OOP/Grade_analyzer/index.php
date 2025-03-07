<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;  
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header-container {
            background-color: #333;
            padding: 10px 0;
        }

        .header-container ul {
            display: flex;
            justify-content: center;
            list-style-type: none;
        }
        .header-container ul li {
            margin: 0 20px;
            font-size: 18px;
        }

        .header-container ul a {
            text-decoration: none;
            color: #fff;
            transition: color 0.3s;
        }

        .header-container ul a:hover {
            color: #1e90ff;
        }

        .box-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 50px;
        }

        .box-container a {
            display: block;
            padding: 15px 30px;
            background-color: #1e90ff;
            color: white;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .box-container a:hover {
            background-color: #1c75c8;
            transform: translateY(-5px);
        }

        .box-container a:active {
            transform: translateY(2px);
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="header-container">
            <ul>
                <a href=".">
                    <li>Logo</li>
                </a>
                <a href="./View/Login.php">
                    <li>Login</li>
                </a>
                <a href="./View/TeacherLogin.php">
                    <li>TeacherLogin</li>
                </a>
                <a href="./View/RegisterTeacher.php">
                    <li>Sign Up</li>
                </a>
                <a href="#">
                    <li>About Us</li>
                </a>
            </ul>
        </div>
    </div>
</body>

</html>