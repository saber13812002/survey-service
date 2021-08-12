<?php

namespace App\Models;

use App\Helpers\CustomSeeder\Seeder;
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

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // auto-sets values on creation
        static::creating(function ($query) {
            if (!(new Seeder())->isRunning()) {
                $query->client_app_id = request()->app_id;
            }
        });
    }

    public function choice(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PackageQuestionChoice::class, 'id', 'choice_id');
    }

    public function package(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Package::class, 'id', 'package_id');
    }

    public function question(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PackageQuestion::class, 'id', 'question_id');
    }

    public function scopeAppId($query)
    {
        return $query->where('client_app_id', request()->app_id);
    }
}
