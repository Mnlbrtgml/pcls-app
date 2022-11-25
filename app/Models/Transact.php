<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transact extends Model
{
    use HasFactory;

    protected $fillable = [
        'processed_by',
        'name',
        'address',
        'number',
        'pickup_date',
        'scheduled_date',
        'delivered_date',
        'total'
    ];
}
