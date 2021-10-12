<?php

namespace App\Http\Filters;

use BFilters\Filter;
use Illuminate\Http\Request;

class PackageFilter extends Filter
{
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->relations = [
            'categories' => [
                'id' => 'category_id'
            ]
        ];

        //$this->sumField = null;
    }
}
