<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\studentmodel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/create', function () {
    return view('student_form');
})->name('student.create');
// Support visiting /student in the browser (redirect to the create form)
Route::get('/student', function () {
    return redirect()->route('student.create');
})->name('student.index');

// Students list page
Route::get('/students', function () {
    $students = studentmodel::all();
    return view('students_list', compact('students'));
})->name('students.index');

// Delete student
Route::delete('/students/{id}', function ($id) {
    $s = studentmodel::find($id);
    if ($s) { $s->delete(); }
    return redirect()->route('students.index')->with('success', 'Student deleted.');
})->name('students.destroy');

// Update student
Route::put('/students/{id}', function (Request $request, $id) {
    $data = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'course' => 'required|string|max:255',
        'year_level' => 'required',
        'email' => 'required|email|max:255',
    ]);

    $s = studentmodel::find($id);
    if ($s) {
        $s->update($data);
    }
    return redirect()->route('students.index')->with('success', 'Student updated.');
})->name('students.update');

Route::post('/student', function (Request $request) {
    $data = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'course' => 'required|string|max:255',
        'year_level' => 'required|integer',
        'email' => 'required|email|max:255|unique:student_info,email',
    ]);

    studentmodel::create($data);

    return redirect()->route('student.create')->with('success', 'Student saved.');
})->name('student.store');

