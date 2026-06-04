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

