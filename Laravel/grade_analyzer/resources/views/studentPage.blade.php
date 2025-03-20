<div>
    <h1>Student List Page</h1>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Batch</th>
        </tr>
        @foreach ($data as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->batch }}</td>
            </tr>
        @endforeach
    </table>


</div>