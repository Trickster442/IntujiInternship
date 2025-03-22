<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            height: 100vh;
            background-color: #016399;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-container {
            width: 80%;
            height: 80%;
            background-color: black;
            display: flex;
            border-radius: 10px;
            overflow: hidden;
        }

        .right-container {
            width: 50%;
            background-color: #2B92A0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 2rem;
            padding: 20px;
        }

        .left-container {
            width: 50%;
            background-color: #040D3C;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left-container form {
            width: 80%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .left-container input {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
            width: 100%;
        }

        .left-container select {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
            width: 100%;
        }

        .left-container button {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
            background-color: #2B92A0;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .left-container button:hover {
            background-color: #1b6f79;
        }

        p {
            text-align: center;
            color: #fff;
            font-size: 1.5rem;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            text-align: center;
            color: white;
            width: 80%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: none;
            background-color: #2B92A0;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        h1 {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="right-container">
            Welcome
        </div>
        <div class="left-container">
            <h1>Register</h1>
            <form action="#" method="post">
                <select name="role" required>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="ClassTeacher">Class Teacher</option>
                </select>
                <input type="text" name="name" placeholder="Enter your name" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="cPassword" placeholder="Confirm Password" required>
                <button type="submit">Register</button>
            </form>
            <a href="/">Login</a>

            <p>
                School Management System
            </p>
        </div>
    </div>
</body>

</html>