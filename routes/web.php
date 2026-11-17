
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Student;


// Redirect homepage to student list
Route::get('/', function () {
    return redirect('/students');
});


// 1. Display Create Student Form
Route::get('/student/create', function () {
    return view('student.create');
});


// 2. Store New Student
Route::post('/student', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    Student::create($validated);

    return redirect('/students')
        ->with('success', 'Student created successfully!');

});


// 3. Display All Students
Route::get('/students', function () {

    $students = Student::all();

    return view('student.list', compact('students'));

})->name('students.index');


// 4. Display Individual Student Details
Route::get('/students/{id}', function ($id) {

    $student = Student::findOrFail($id);

    return view('student.detail', compact('student'));

});


// 5. Display Edit Student Form
Route::get('/students/{id}/edit', function ($id) {

    $student = Student::findOrFail($id);

    return view('student.edit', compact('student'));

});


// 6. Update Student Information
Route::put('/students/{id}', function (Request $request, $id) {

    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',

        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('students', 'email')->ignore($student->id),
        ],

        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect('/students/' . $student->id)
        ->with('success', 'Student updated successfully!');

});


// 7. Delete Student
Route::delete('/students/{id}', function ($id) {

    $student = Student::findOrFail($id);

    $student->delete();

    return redirect('/students')
        ->with('success', 'Student deleted successfully!');

});
