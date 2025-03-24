<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #f0f0f0;
            padding: 10px;
        }

        .header ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        .header li {
            cursor: pointer;
        }

        .content {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .footer {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #666;
        }

        p {
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="header">
        <ul>
            <li>Logo</li>
            <li>About</li>
            <li>Contact us</li>
            <li>Settings</li>
        </ul>
    </div>

    <div>{{ $content }}</div>

    <div class="footer">
        <p>This is footer</p>
    </div>
</body>

</html>