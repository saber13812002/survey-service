<?php

namespace App\Http\Filters;

use BFilters\Filter;
use Illuminate\Http\Request;

class CampaignFilter extends Filter
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->relations = [];
    }
}
