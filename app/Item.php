<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	// establishes the one to many relation between items and category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
