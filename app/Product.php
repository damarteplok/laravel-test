<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [

    	'name',
    	'price', 
    	'description'
    	
    
    ];
    public function books()

    {

    	return $this->hasMany('App\Booklist', 'product_id');

    }

}
