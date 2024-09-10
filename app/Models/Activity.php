<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'activities';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'images',
        'location_id',
        'category_id',
        'slug',
        'price_idr',
        'price_usd',
        'meta_description',
        'description',
        'is_published',
    ];

//    protected $casts = [
//        'images' => 'array',
//    ];

    public function location(): HasOne
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

    /**
     * Get the user that owns the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ActivityCategory::class, 'category_id', 'id');
    }

    /**
     * Get the user that owns the Activity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function featured(): BelongsTo
    {
        return $this->belongsTo(FeaturedActivity::class, 'id', 'activity_id');
    }
}
