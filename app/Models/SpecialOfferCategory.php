<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialOfferCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'special_offer_categories';

    protected $fillable = [
        'title'
    ];

    protected $dates = ['deleted_at'];

    public $timestamps = true;
}
