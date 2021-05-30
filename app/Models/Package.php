<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'client_app_id', 'packable_id', 'packable_type'
    ];

    /**
     * Get all of the owning packable models.
     */
    public function packable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get all of the tags for the package.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
