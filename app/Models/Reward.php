<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'store_id', 'amount', 'display', 'range', 'description', 'previous'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
