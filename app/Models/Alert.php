<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;
    namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'user_id', 'store_id', 'operator', 'percent', 'alert_type', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

}
