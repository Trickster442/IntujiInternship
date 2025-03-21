<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    <h3>Update teacher</h3>
    <form action="/teacher/update/{{ $teacher->id }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="put">
        <input type="text" name="name" value="{{ $teacher->name }}" placeholder="Enter your name">
        <br>
        <br>

        <input type="email" name="email" value="{{ $teacher->email }}" placeholder="Enter your password">
        <br>
        <br>

        <input type="text" name="batch" value="{{ $teacher->batch }}" placeholder="Enter your batch">
        <br>
        <br>
        <button>Update teacher</button>
        <button><a href="/teacher/get">Cancel</a></button>
    </form>
</div>