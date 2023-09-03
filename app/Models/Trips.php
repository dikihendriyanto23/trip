<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    protected $table = 'trip';
    protected $guarded = [
        'id_trip'
    ];
}
