<h2>Add New User</h2>
<form action="/validate-user" method="post">
    @csrf

    <!-- @if($errors->any())
        @foreach($errors->all() as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
    @endif -->

    <div>
        Username :
        <input type="text" name="username">
        <span>@error('username'){{ $message }}@enderror</span>
    </div>
    <div>
        Email :
        <input type="email" name="email">
        <span>@error('email'){{ $message }}@enderror</span>
    </div>
    <div>
        Password :
        <input type="password" name="password">
        <span>@error('password'){{ $message }}@enderror</span>
    </div>
    <button type="submit">Submit</button>

</form>