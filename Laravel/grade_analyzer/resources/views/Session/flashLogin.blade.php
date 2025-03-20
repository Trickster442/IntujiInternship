<div>
    <h1>Login Page</h1>

    {{ session('message') }}
    <form action="/flash-session-form" method="post">
        @csrf
        <input type="text" name="user" placeholder="enter name">
        <br>
        <br>
        <input type="password" name="password" placeholder="enter password">
        <br>
        <br>
        <button type="submit">Login</button>
    </form>
</div>