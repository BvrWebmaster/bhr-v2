<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AccomodationGeneralFacilities extends Model
{
    use HasFactory;

    protected $table = 'accomodation_general_facilities';

    protected $fillable = [
        'name'
    ];

    public function accomodations(): BelongsToMany
    {
        return $this->belongsToMany(Accomodation::class, 'accomodation_facilities','facility_id','accomodation_id');
    }
}
