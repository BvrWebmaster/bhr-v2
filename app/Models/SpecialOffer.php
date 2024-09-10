<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialOffer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'special_offers';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'category_id',
        'cover_image',
        'title',
        'slug',
        'meta_description',
        'description',
        'price_idr',
        'price_usd',
        'inclusions',
        'valid_until',
    ];

    public $timestamps = true;

    protected $casts = [

        'inclusions' => 'array'

    ];

    /**
     * Get the user associated with the SpecialOffer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category(): HasOne
    {
        return $this->hasOne(SpecialOfferCategory::class, 'id', 'category_id');
    }
}
