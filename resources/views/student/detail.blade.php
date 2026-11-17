
<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>

    <h1>Student Details</h1>

    {{-- Success message --}}
    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    {{-- Display student information --}}
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>ID</th>
            <td>{{ $student->id }}</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>{{ $student->name }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $student->email }}</td>
        </tr>

        <tr>
            <th>Phone</th>
            <td>{{ $student->phone }}</td>
        </tr>

        <tr>
            <th>Address</th>
            <td>{{ $student->address ?? 'N/A' }}</td>
        </tr>

        <tr>
            <th>Date of Birth</th>
            <td>{{ $student->date_of_birth ?? 'N/A' }}</td>
        </tr>

        <tr>
            <th>Created At</th>
            <td>{{ $student->created_at }}</td>
        </tr>

        <tr>
            <th>Updated At</th>
            <td>{{ $student->updated_at }}</td>
        </tr>

    </table>

    <br>

    {{-- Edit student --}}
    <a href="/students/{{ $student->id }}/edit">
        Edit Student
    </a>

    <br><br>

    {{-- Back to student list --}}
    <a href="/students">
        Back to Student List
    </a>

</body>
</html>
