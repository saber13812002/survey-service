<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviceable extends Model
{
    use HasFactory;

    protected $fillable = [
        "serviceable_type",
        "serviceable_id"
    ];

}
