<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FeaturedActivity extends Model
{
    use HasFactory;

    protected $table = 'featured_activities';

    protected $date = ['deleted_at'];

    protected $fillable = [

        'activity_id'

    ];

    public $timestamps = true;

    /**
     * Get the user associated with the FeaturedActivity
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activity(): HasOne
    {
        return $this->hasOne(Activity::class, 'id', 'activity_id');
    }
}
