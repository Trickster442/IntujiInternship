<h2>Add New User</h2>

<form action="adduser" method="post">
    @csrf
    <input type="text" name="name" placeholder="enter your name...">
    <button type="submit">Submit</button>
</form>