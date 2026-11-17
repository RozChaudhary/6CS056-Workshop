
<x-layouts.app title="Edit Student">
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $student->name) }}"
                required
            >
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $student->email) }}"
                required
            >
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $student->phone) }}"
                required
            >
            @error('phone')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="address">Address</label>
            <textarea id="address" name="address">{{ old('address', $student->address) }}</textarea>
            @error('address')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="date_of_birth">Date of Birth</label>
            <input
                type="date"
                id="date_of_birth"
                name="date_of_birth"
                value="{{ old('date_of_birth', $student->date_of_birth?->format('Y-m-d')) }}"
            >
            @error('date_of_birth')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn">Update Student</button>

        <a href="{{ route('students.show', $student) }}">Cancel</a>
    </form>
</x-layouts.app>
