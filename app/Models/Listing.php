<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
   protected $fillable = [
    'title',
    'description',
    'price',
    'city',
    'address',
    'image',
    'latitude',
'longitude',
    'image2',
    'image3',
    'image4',
    'type',
    'availability',
    'wifi',
'parking',
'climatisation',
'television',
'eau_chaude',
'groupe_electrogene',
'securite',
'cuisine',
    'user_id'
];
    public function user()
{
    return $this->belongsTo(User::class);
}
public function reviews()
{
    return $this->hasMany(\App\Models\Review::class);
}
}
