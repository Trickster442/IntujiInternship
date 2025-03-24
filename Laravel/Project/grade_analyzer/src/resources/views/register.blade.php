<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>

<body>
    <div class="main-container">
        <div class="right-container">
            Welcome
        </div>
        <div class="left-container">
            <h1>Register</h1>

            <form action="/register-teacher" method="post">
                @csrf

                <select name="role" required>
                    <option value="Teacher">Teacher</option>
                    <option value="ClassTeacher">Class Teacher</option>
                </select>

                <input type="text" name="fName" placeholder="Enter your first name" value="{{ old('fName') }}" required>
                <span class="error">
                    <x-validation-error field="fName" />
                </span>

                <input type="text" name="lName" placeholder="Enter your last name" value="{{ old('lName') }}" required>
                <span class="error">
                    <x-validation-error field="lName" />
                </span>

                <input type="text" name="phone" placeholder="Enter your number" value="{{ old('phone') }}" required
                    maxlength="20">
                <span class="error">
                    <x-validation-error field="phone" />
                </span>

                <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                <span class="error">
                    <x-validation-error field="email" />
                </span>

                <input type="password" name="password" placeholder="Password" required>
                <span class="error">
                    <x-validation-error field="password" />
                </span>

                <input type="password" name="cPassword" placeholder="Confirm Password" required>
                <span class="error">
                    <x-validation-error field="cPassword" />
                </span>


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