<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$students = Student::orderBy("id","desc")->get();
        return view("student.index",compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator :: make($request->all(),[
			"name"=>"required|max:255",
			"email"=>"required|max:255|unique:students|email",
		],[
			"name.required" => "Name is needed",
			"email.required" => "Email is needed",
			"email.email" => "Email should be valid email",
		])->validate(); //For auto redirection purpose validate()
		
		$obj = new Student;
		$obj->name = $request->name;
		$obj->email = $request->email;
		$obj->created_dt = date("Y-m-d h:i:s");
		$is_saved = $obj->save();
		if($is_saved){	//If row inserted
			session()->flash("studentMessage","Student has been inserted");
			return redirect("student/create");
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$student = Student::find($id); 
        return view("student.edit",compact("student"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Validator :: make($request->all(),[
			"name"=>"required|max:255",
			"email"=>"required|max:255|unique:students|email",
		],[
			"name.required" => "Name is needed",
			"email.required" => "Email is needed",
			"email.email" => "Email should be valid email",
		])->validate(); //For auto redirection purpose validate()
		http://localhost/phpmyadmin/sql.php
		$student = Student::find($id);
		$student->name = $request->name;
		$student->email = $request->email;
		$is_saved = $student->save();
		if($is_saved){	//If row inserted
			session()->flash("studentMessage","Student has been updated");
			return redirect("student/".$id."/edit");
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
		$is_deleted = $student->delete();
		if($is_deleted){	//If row inserted
			session()->flash("studentMessage","Student has been deleted");
			return redirect("student");
		}
    }
}
