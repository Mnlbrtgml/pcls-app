<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'clothe_types',
        'weight',
        'total',
        'status'
    ];
}
