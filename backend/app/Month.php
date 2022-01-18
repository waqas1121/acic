<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    public function prayers()
    {
        return $this->hasMany('App\Prayer','month_id');
    }
}
