<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;
use Stevebauman\Purify\Facades\Purify;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $fillable = [
        'title',
        'iso_code',
        'phone',
        'currency_symbol',
        'capital',
        'currency',
        'continent',
        'continent_code',
        'iso3',
    ];

    /**
     * Get all of the comments for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(Language::class, 'country_code', 'iso_code');
    }
}
