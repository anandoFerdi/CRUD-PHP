<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginatorImage;

class negara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'benua', 'presiden', 'image'
    ];

}
