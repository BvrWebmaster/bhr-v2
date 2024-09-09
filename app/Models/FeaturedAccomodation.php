<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeaturedAccomodation extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'accomodation_id',

    ];

    public $timestamps = true;

    /**
     * Get the user associated with the FeaturedAccomodation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function accomodation(): HasOne
    {
        return $this->hasOne(Accomodation::class, 'id', 'accomodation_id');
    }
}
