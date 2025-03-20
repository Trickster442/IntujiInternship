<div>
    <h1>Profile Page</h1>
    @if (session('user'))
        Welcome , {{ session('user') }}
    @else
        No user found
    @endif

    <a href="\session-logout">Logout</a>
</div>