<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function services(){
		return view("home.services");
	}
	
	public function products(){
		return view("home.products");
	}
	
	public function team(){
		return view("home.team");
	}
}
