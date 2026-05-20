<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'status'];

    public function scopeGetItemList($query, $filter = null)
    {
        if ($filter) {
            return $query->where('name', 'like', '%' . $filter . '%')->get();
        }
        return $query->get();
    }
}
