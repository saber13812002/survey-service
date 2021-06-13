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

        'order',
        'weight',
        'is_active',
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

    public function correctChoice(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PackageQuestionChoice::class, 'correct_choice_id');
    }
}
