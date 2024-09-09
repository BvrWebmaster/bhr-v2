<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccomodationCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'accomodation_categories';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public $timestamps = true;

    public function accomodations(): HasMany
    {
        return $this->hasMany(Accomodation::class, 'category_id', 'id');
    }
}
