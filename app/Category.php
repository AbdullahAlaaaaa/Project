<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	// Establishes the one to many relation between a Category and Items
    public function item(){

    	return $this->hasMany('App\Item','category_id','id');
    }
}
