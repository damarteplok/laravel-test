<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable


{
    //
    use Notifiable;
    protected $guard = 'customer';
    
    protected $fillable = [

    	'name',
    	'alamat', 
    	'nohp', 
    	'email'
    
    ];

    public function books()
    {
        return $this->hasMany('App\Booklist', 'customer_id');
    }
}
