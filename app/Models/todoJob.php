<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoJob extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function ($q, $search) {
            $q->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        })->when($filters['priority'] ?? false, function($q, $priority){
            $q->where(function ($query) use($priority){
                $query->where('priority',$priority);
            });
        })->when($filters['status'] ?? false, function($q, $status){
            $q->where(function ($query) use($status){
                $query->where('status',$status);
            });
        });
    }
}
