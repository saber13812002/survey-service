<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
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
        'title',
        'description',

        'client_app_id',

        'packable_id',
        'packable_type',

        'first_text',
        'final_text',

        'started_at',
        'finished_at',

        'is_active',
        'is_deletable',

    ];

    /**
     * @var \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|\Illuminate\Support\HigherOrderCollectionProxy|mixed
     */

    public $packable_id;

    /**
     * @var \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|\Illuminate\Support\HigherOrderCollectionProxy|mixed
     */

    public $packable_type;

    /**
     * Get all of the owning packable models.
     */
    public function packable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get all of the tags for the package.
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Get all of the categories for the package.
     */
    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     * Get all of the tags for the package.
     */
    public function campaigns(): MorphToMany
    {
        return $this->morphToMany(Campaign::class, 'campanile');
    }

    /**
     * Get the questions
     */
    public function questions(): HasMany
    {
        return $this->hasMany(PackageQuestion::class, 'package_id');
    }

}
