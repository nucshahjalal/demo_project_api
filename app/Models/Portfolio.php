<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['name', 'status'];

    public function scopeGetPortfolioList($query, $filter = null)
    {
        if ($filter) {
            return $query->where('name', 'like', '%' . $filter . '%')->get();
        }
        return $query->get();
    }
}
