<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    protected $fillable = ['type'];
}
