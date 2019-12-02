<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $fillable = ["name","email","description"];//to be inserted
	
	protected $guarded = []; to not be inserted
	
	protected $table = "my_product";
}
