
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

    <h1>Edit Student Information</h1>

    {{-- Display validation errors --}}
    @if($errors->any())
        <div style="color: red;">
            <h3>Please fix the following errors:</h3>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit student form --}}
    <form action="/students/{{ $student->id }}" method="POST">

        @csrf
        @method('PUT')

        {{-- Student Name --}}
        <label for="name">Full Name:</label>
        <br>

        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $student->name) }}"
            required
        >

        <br><br>

        {{-- Email --}}
        <label for="email">Email:</label>
        <br>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $student->email) }}"
            required
        >

        <br><br>

        {{-- Phone --}}
        <label for="phone">Phone:</label>
        <br>

        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone', $student->phone) }}"
            required
        >

        <br><br>

        {{-- Address --}}
        <label for="address">Address:</label>
        <br>

        <textarea
            id="address"
            name="address"
            rows="4"
            cols="40"
        >{{ old('address', $student->address) }}</textarea>

        <br><br>

        {{-- Date of Birth --}}
        <label for="date_of_birth">Date of Birth:</label>
        <br>

        <input
            type="date"
            id="date_of_birth"
            name="date_of_birth"
            value="{{ old('date_of_birth', $student->date_of_birth) }}"
        >

        <br><br>

        {{-- Submit button --}}
        <button type="submit">
            Update Student
        </button>

    </form>

    <br>

    {{-- Back to student details --}}
    <a href="/students/{{ $student->id }}">
        Cancel
    </a>

    <br><br>

    {{-- Back to student list --}}
    <a href="/students">
        Back to Student List
    </a>

</body>
</html>
