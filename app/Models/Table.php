<?php

namespace App\Models;

use App\Enums\TableLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location', 'chaises'];

    protected $casts = [
        'location' => TableLocation::class
    ];
}
