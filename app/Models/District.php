<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $fillable = [
        'name',
        'area',
        'municipality_id',
        'department_id',
        'zone_id',
        'flag',
        'population',
        'slug',
        'location',
        'itHasBeach',
        'itHasLake',
        'itHasVolcano',
    ];
}