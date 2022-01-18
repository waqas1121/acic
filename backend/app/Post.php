<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }


    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
