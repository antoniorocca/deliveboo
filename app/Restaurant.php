<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    
}
