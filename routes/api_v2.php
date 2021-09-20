<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v2;

/*
 * api_v2
*/


    // reports
    Route::get('/packages/{id}/reports', [v2\ReportController::class, 'byPackageId'])->name('report.by.package.id');
