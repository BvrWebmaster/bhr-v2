<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Accomodation extends Model
{
    use HasFactory, HasSEO;

    protected $table = 'accomodations';

    protected $dates = ['deleted_at'];

    protected $casts = [
        'general_facilities' => 'array',
        'images' => 'array'
    ];

    protected $fillable = [
        'category_id',
        'location_id',
        'featured_image',
        'images',
        'name',
        'slug',
        'meta_description',
        'about',
        'check_in_time',
        'check_out_time',
        'latitude',
        'longitude',
        'is_published'
    ];

    public $timestamps = true;

    /**
     * Get all of the comments for the Accomodation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomtypes(): HasMany
    {
        return $this->hasMany(AccomodationRoomType::class, 'accomodation_id', 'id');
    }


    /**
     * Get the user associated with the Accomodation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location(): HasOne
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

    /**
     * Get the user associated with the Accomodation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(AccomodationCategory::class, 'category_id', 'id');
    }

    /**
     * The roles that belong to the Accomodation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(AccomodationGeneralFacilities::class, 'accomodation_facilities','accomodation_id','facility_id');
    }

    /**
     * Get the user associated with the Accomodation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function featured(): HasOne
    {
        return $this->hasOne(FeaturedAccomodation::class, 'accomodation_id', 'id');
    }
}
