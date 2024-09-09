<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccomodationRoomType extends Model
{
    use HasFactory;

    protected $table = 'accomodation_room_types';

    protected $fillable = [

        'meta_description',

        'description',

        'name',

        'slug',

        'price_per_night',

        'featured_image',

        'images',

        'is_published',

        'max_adult',

        'max_children'

    ];

    public $timestamps = true;

    protected $casts = [
        'images' => 'array'
    ];

    /**
     * Get the user that owns the AccomodationRoomType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accomodation(): BelongsTo
    {
        return $this->belongsTo(Accomodation::class, 'accomodation_id', 'id');
    }
}
