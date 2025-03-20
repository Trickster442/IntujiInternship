<div>
    <h1>User login</h1>
    <form action="/http" method="post">
        @csrf
        <input type="text" name="name" placeholder="enter Name">
        <br>
        <input type="password" name="password" placeholder="enter password">
        <br>
        <button>Login</button>

    </form>
</div>