<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    <h1>Teacher List</h1>
    <form action="/teacher/search" method="get">
        <input type="text" name="search" placeholder="Search by name" value="{{ @$search }}">
        <button>Search</button>
    </form>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Batch</th>
            <th>Operation</th>
        </tr>

        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->batch }}</td>
                <td>
                    <a href="{{ 'delete/' . $teacher->id }}">Delete</a>
                    <a href="{{ 'edit/' . $teacher->id }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $teachers->links() }}
</div>

<style>
    .w-5.h-5 {
        width: 20px;
    }
</style>