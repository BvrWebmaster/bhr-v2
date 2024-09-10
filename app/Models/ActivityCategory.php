<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityCategory extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;

    protected $table = 'activity_categories';

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'featured_image',

        'name',

        'slug',

        'description'

    ];

    public $timestamps = true;

    /**
     * Get all of the comments for the ActivityCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class, 'category_id', 'id');
    }
}
