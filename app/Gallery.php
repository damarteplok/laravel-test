<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = ['name'];

    public function galleryphotos(){
    	return $this->hasMany('App\GalleryPhoto', 'gallery_id');
    }
}
