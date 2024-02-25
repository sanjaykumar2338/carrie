<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reward;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'storeId',
        'storeName',
        'siteUrl',
        'activationCode',
        'affiliatizerEnabled',
        'orderConfirmationURLRegex',
        'orderConfirmationDOMRegex',
        'icbEnabled',
        'shoppingURL',
        'largeLogoUrl',
        'squareLogoUrl',
        'squareLogoInverseUrl',
        'largeLogoBackgroundColor',
        'squareLogoBackgroundColor',
        'squareLogoInverseBackgroundColor',
    ];

    public function reward()
    {
        return $this->hasOne(Reward::class);
    }

    // Define any additional model properties or methods here as needed.
}
