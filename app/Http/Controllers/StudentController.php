<?php

namespace App\Http\Controllers;

use App\Models\MyClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use stdClass;

class StudentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('students.index', [
      'students' => Student::all(),
    ]);
  }

  /** 
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // $key = config('app.csc_token');
    // $email = config('app.csc_email');
    // $authToken = Http::withHeaders([
    //   "Accept" => "application/json",
    //   "api-token" => $key,
    //   "user-email" => $email,
    // ])->get('https://www.universal-tutorial.com/api/getaccesstoken')->json()['auth_token'];

    // $cities = Http::withToken($authToken)->get('https://www.universal-tutorial.com/api/states/Indonesia')
    //   ->json();
    return view('students.create', [
      'classes' => MyClass::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required:max:255',
      'address' => 'required:max:255',
      'class_id' => 'required',
    ]);

    Student::create($validatedData);
    return redirect('/students');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function show(Student $student)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function edit(Student $student)
  {
    return view('students.edit', [
      'classes' => MyClass::all(),
      'student' => $student,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Student $student)
  {
    $validatedData = $request->validate([
      'name' => 'required:max:255',
      'address' => 'required:max:255',
      'class_id' => 'required',
    ]);

    Student::where('id', $student->id)
      ->update($validatedData);
    return redirect('/students');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Student  $student
   * @return \Illuminate\Http\Response
   */
  public function destroy(Student $student)
  {
    Student::destroy($student->id);
    return back();
  }

  public function destroyAll()
  {
    // dd('test');
    Student::truncate();
    return back();
  }
}
