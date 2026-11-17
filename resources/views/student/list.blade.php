
<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>

    <h1>Student Management System</h1>

    {{-- Success message --}}
    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <h2>All Students</h2>

    {{-- Add Student button --}}
    <a href="/student/create">Add New Student</a>

    <br><br>

    @if($students->isEmpty())

        <p>No students found.</p>

    @else

        <table border="1" cellpadding="10" cellspacing="0">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date of Birth</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($students as $student)

                    <tr>
                        <td>{{ $student->id }}</td>

                        <td>{{ $student->name }}</td>

                        <td>{{ $student->email }}</td>

                        <td>{{ $student->phone }}</td>

                        <td>{{ $student->address ?? 'N/A' }}</td>

                        <td>{{ $student->date_of_birth ?? 'N/A' }}</td>

                        <td>
                            {{-- View student --}}
                            <a href="/students/{{ $student->id }}">
                                View
                            </a>

                            |

                            {{-- Edit student --}}
                            <a href="/students/{{ $student->id }}/edit">
                                Edit
                            </a>

                            |

                            {{-- Delete student --}}
                            <form
                                action="/students/{{ $student->id }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this student?');"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    @endif

</body>
</html>
