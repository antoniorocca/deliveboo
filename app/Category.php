<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function restaurants()
  {
      return $this->belongsToMany('App\Restaurant');
  }

  protected $fillable = ['category'];

}
