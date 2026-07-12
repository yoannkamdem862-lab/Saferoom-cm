<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'listing_id',
        'client_name',
        'rating',
        'comment',
        'verified'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
