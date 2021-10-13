<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'parent_id',
    ];

    /**
     * @var mixed|string
     */
    private $title;


    /**
     * Get all of the packages that are assigned this tag.
     */
    public function packages()
    {
        return $this->morphedByMany(Package::class, 'categorizable')->select('*')->orderBy('order', 'asc');
    }

    /**
     * Get the questions
     */
    public function categorizables(): HasMany
    {
        return $this->hasMany(Categorizable::class, 'category_id');
    }
}
