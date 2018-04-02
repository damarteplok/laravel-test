<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    //
    protected $fillable = ['gallery_id', 'filename'];

    public function gallery(){
    	return $this->belongsTo('App\Gallery', 'gallery_id');
    }
}
