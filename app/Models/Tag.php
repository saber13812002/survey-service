<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
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
        return $this->morphedByMany(Package::class, 'taggable');
    }
}



//$package = Package::find(1);
//
//dd($package->tags);
//
//$tag = App\Models\Tag::find(1);
//
//dd($tag->packages);
// https://www.itsolutionstuff.com/post/laravel-many-to-many-polymorphic-relationship-tutorialexample.html


//$package = Package::find(1);
//
//$tag = new Tag();
//$tag->title = "ItSolutionStuff.com";
//
//$package->tags()->save($tag);

