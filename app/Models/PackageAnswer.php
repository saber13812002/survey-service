<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageAnswer extends Model
{
    use HasFactory;
    use HasFilter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'package_id',
        'question_id',

        'title',
        'description',

        'client_app_id',
        'user_id',
        'choice_id',
    ];

    public function choice(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PackageQuestionChoice::class, 'id');
    }
}
