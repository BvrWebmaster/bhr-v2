<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subscribers';

    protected $fillable = [
        'full_name',
        'email_address',
        'phone_number'
    ];

    protected $dates = ['deleted_at'];

    public $timestamps = true;
}
