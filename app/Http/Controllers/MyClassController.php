<?php

namespace App\Http\Controllers;

use App\Models\MyClass;
use Illuminate\Http\Request;

class MyClassController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('class', [
      'members' => MyClass::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
      'name' => 'required:max:255|unique:class',
      'major' => 'required:max:255',
    ]);

    MyClass::create($validatedData);
    return redirect('/class');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\MyClass  $myClass
   * @return \Illuminate\Http\Response
   */
  public function show(MyClass $myClass)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\MyClass  $myClass
   * @return \Illuminate\Http\Response
   */
  public function edit(MyClass $myClass)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\MyClass  $myClass
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, MyClass $myClass)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\MyClass  $myClass
   * @return \Illuminate\Http\Response
   */
  public function destroy(MyClass $myClass)
  {
    //
  }
}
