<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name','phone_number', 'description', 'img', 'location','opening_time','closure_time','free_shipping', 'price_shipping', 'quality',
    ];
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

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }


}
