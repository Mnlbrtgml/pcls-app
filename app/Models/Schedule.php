<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'number',
        'pickup_date',
        'scheduled_date',
        'delivered_date',
        'total'
    ];
}
