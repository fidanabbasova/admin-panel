<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['description'];
    public $timestamps = true;

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
