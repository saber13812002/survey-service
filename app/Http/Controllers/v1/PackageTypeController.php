<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageTypeResource;
use App\Models\PackageType;
use Illuminate\Http\Request;

class PackageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PackageTypeResource
     */
    public function index(): PackageTypeResource
    {
        return new PackageTypeResource(["data" => PackageType::query()->get()]);
    }

}
