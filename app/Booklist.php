<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Booklist extends Model
{
    //
    
    

	protected $fillable = [
 
    	'date', 
    	'status',
    	'customer_id',
        'product_id',
        'invoice'

    ];


    public function product()

    {

    	return $this->belongsTo('App\Product', 'product_id');

    }

    public function customer()

    {

    	return $this->belongsTo('App\Customer', 'customer_id');

    }
}
