<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get all of the Quiz's packages.
     */
    public function packages(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Package::class, 'packable');
    }
}
