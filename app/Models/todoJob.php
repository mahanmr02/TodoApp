<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoJob extends Model
{
    protected $guarded = ['id'];

    public function scopeFilter($query, $filters){

    }
}
