<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageQuestion extends Model
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

        'package_id',

        'answer_type_id',
        'correct_choice_id',
    ];


    /**
     * Get the choices
     */
    public function choices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PackageQuestionChoice::class,'question_id');
    }
}
