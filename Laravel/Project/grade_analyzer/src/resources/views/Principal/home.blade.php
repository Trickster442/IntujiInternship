<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal Home Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/principalHome.css') }}">
</head>

<body>
    <div class="main-container">
        <div class="left-container">
            <div class="top">
                <div class="logo">
                    <h1>Logo</h1>
                </div>

                <div class="menu">
                    <h3>Menu</h3>
                </div>

            </div>

            <div class="navigation">
                <ul>
                    <li>Dashboard</li>
                    <li>
                        <div class="navigation-button">
                            <span>Students</span>
                            <span><b>></b></span>
                        </div>
                    </li>
                    <li>
                        <div class="navigation-button">
                            <span>Academic Staff</span>
                            <span><b>></b></span>
                        </div>
                    </li>
                    <li>
                        <div class="navigation-button">
                            <span>Non Academic</span>
                            <span><b>></b></span>
                        </div>
                    </li>
                    <li>
                        <div class="navigation-button">
                            <span>Parent</span>
                            <span><b>></b></span>
                        </div>
                    </li>
                    <li>Admin</li>
                    <li> <a href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="right-container">

        </div>
    </div>
</body>

</html>