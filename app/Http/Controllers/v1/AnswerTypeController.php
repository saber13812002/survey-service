<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnswerTypeResource;
use App\Models\AnswerType;

class AnswerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnswerTypeResource
     */
    public function index()
    {
        return new AnswerTypeResource(["data" => AnswerType::query()->get()]);
    }

}
