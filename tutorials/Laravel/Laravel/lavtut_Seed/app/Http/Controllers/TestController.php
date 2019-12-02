<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\MyForm;
use Validator;
use DB;
use App\Product;
use App\Author;

class TestController extends Controller
{
	public function myform(){
		return view("form.myform");
	}
	
	public function submitmyform(Request $request){
		
		$validator = Validator::make($request->all(),[
			"name"=>"required",
			"email"=>"required|max:20|min:10|email|unique:authors",
			"age"=>"required",
		],[
		"name.required"=>"Name should be filled",
			"email.required"=>"Email should be filled",
			"email.min"=>"Length should be more than 10"
		])->validate();
		
		/*if($validator->fails()){
			//error
			return redirect("form")->withErrors($validator);
		}else{
			//pass
			print_r($request->all());
		}*/
		
		/*
		$this->validate($request,[
			"name"=>"required",
			"email"=>"required|max:20|min:10|email|unique:authors",
			"age"=>"required",
		],[
			"name.required"=>"Name should be filled",
			"email.required"=>"Email should be filled",
			"email.min"=>"Length should be more than 10"
		]);
		
		*/
		//print_r($request->all());
	}
	
	public function selectmodel(){
		$author = new Author;
		
		$data = $author->find(3);	//Delete id = 3
		
		$data->delete();
	}
	
	public function insertorm(){
		$product = Author::create([
			"name" => "Demo Product 15",
			"email" => 30
		]);
	
		$product->save();
		print_r($product);
		//return view("query",compact("data"));
	}
	
    public function queryrun(){
		$data = DB::table("companies")->pluck("email");
		print_r($data);
		//return view("query",compact("data"));
	}
}
