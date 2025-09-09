<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class todoList extends Model
{
    use SoftDeletes;


    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {

        return $query->when($filters['search'] ?? false, function ($q, $search) {
            $q->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhereHas('user', function ($q) use ($search) {
                          $q->where('name', 'like', '%' . $search . '%');
                      });
            });
        });
    }
}
