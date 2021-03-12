<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    
    public function restaurants()
    {
        return $this->belongsToMany('App\Restaurant');
    }
    protected $fillable = ['name_tag', 'color'];
}
