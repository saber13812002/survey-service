<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageQuestion extends Model
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

        'package_id',

        'answer_type_id',

        'order',
        'weight',
        'is_active',

        'source_id',
        'event_ids',
    ];


    /**
     * Get the choices
     */
    public function choices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PackageQuestionChoice::class, 'question_id');
    }

    public function answerType(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AnswerType::class, 'answer_type_id');
    }
}
