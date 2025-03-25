<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/class/add" method="post">
        @csrf
        <label for="class">Class : </label>
        <input type="text" name="className" id="class" required maxlength="30">
        <button type="submit">Add</button>
    </form>
</body>

</html>