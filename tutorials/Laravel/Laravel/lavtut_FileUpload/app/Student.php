<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
	
	public function getVariableAttribute($value){
			
	}
	
	public function getNameAttribute($value){
		return strtoupper($value);	
	}
}
