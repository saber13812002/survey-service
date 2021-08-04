<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
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

        'client_app_id',
        'parent_id',

        'started_at',
        'finished_at',

        'is_active',
    ];

    /**
     * Get all of the packages that are assigned this campaign.
     */
    public function packages(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(Package::class, 'campanile');
    }

    public function scopeAppId($query)
    {
        return $query->where('client_app_id', request()->app_id);
    }
}
