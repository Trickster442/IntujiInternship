<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <div>
        Name : {{ $result->first_name . ' ' . $result->last_name}} <br>
        Phone Number : {{ $result->phone_num }}<br>
        Role : {{  $result->role }}<br>
        email : {{ $result->email }}<br>
    </div>
</body>

</html>