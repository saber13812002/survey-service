<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
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
        return $this->morphedByMany(Package::class, 'categorizable');
    }
}
