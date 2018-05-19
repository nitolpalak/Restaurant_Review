<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    public function user(){
    	return $this->belongsTo('App\User', 'uid');
    }
    public function restaurent(){
    	return $this->belongsTo('App\Restaurent', 'rid');
    }
    public function menu(){
    	return $this->belongsTo('App\Menu', 'menu');
    }
}
