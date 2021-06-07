<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => '/v1',
],
    function () {
        Route::middleware(['auth:access_token'])->group(function () {

            //client-app
            Route::get('/client/apps', [Controllers\v1\ClientAppController::class, 'index'])->name('client.app.index');
            Route::get('/client/apps/{id}', [Controllers\v1\ClientAppController::class, 'show'])->name('client.app.show');
            Route::post('/client/apps', [Controllers\v1\ClientAppController::class, 'store'])->name('client.app.store');
            Route::put('/client/apps/{id}', [Controllers\v1\ClientAppController::class, 'update'])->name('client.app.update');
            Route::delete('/client/apps/{id}', [Controllers\v1\ClientAppController::class, 'destroy'])->name('client.app.destroy');

            //category
            Route::get('/categories', [Controllers\v1\CategoryController::class, 'index'])->name('category.index');
            Route::get('/categories/{id}', [Controllers\v1\CategoryController::class, 'show'])->name('category.show');
            Route::post('/categories', [Controllers\v1\CategoryController::class, 'store'])->name('category.store');
            Route::put('/categories/{id}', [Controllers\v1\CategoryController::class, 'update'])->name('category.update');
            Route::delete('/categories/{id}', [Controllers\v1\CategoryController::class, 'destroy'])->name('category.destroy');

            // Campaign
            Route::get('/campaigns', [Controllers\v1\CampaignController::class, 'index'])->name('campaign.index');
            Route::get('/campaigns/{id}', [Controllers\v1\CampaignController::class, 'show'])->name('campaign.show');
            Route::post('/campaigns', [Controllers\v1\CampaignController::class, 'store'])->name('campaign.store');
            Route::put('/campaigns/{id}', [Controllers\v1\CampaignController::class, 'update'])->name('campaign.update');
            Route::delete('/campaigns/{id}', [Controllers\v1\CampaignController::class, 'destroy'])->name('campaign.destroy');

            // tag
            Route::get('/tags', [Controllers\v1\TagController::class, 'index'])->name('tag.index');
            Route::get('/tags/{id}', [Controllers\v1\TagController::class, 'show'])->name('tag.show');
            Route::post('/tags', [Controllers\v1\TagController::class, 'store'])->name('tag.store');
            Route::put('/tags/{id}', [Controllers\v1\TagController::class, 'update'])->name('tag.update');
            Route::delete('/tags/{id}', [Controllers\v1\TagController::class, 'destroy'])->name('tag.destroy');

            // package Type
            Route::get('/package-types', [Controllers\v1\PackageTypeController::class, 'index'])->name('package.type.index');

            // package
            Route::get('/packages', [Controllers\v1\PackageController::class, 'index'])->name('package.index');
            Route::get('/packages/{id}', [Controllers\v1\PackageController::class, 'show'])->name('package.show');
            Route::post('/packages', [Controllers\v1\PackageController::class, 'store'])->name('package.store');
            Route::put('/packages/{id}', [Controllers\v1\PackageController::class, 'update'])->name('package.update');
            Route::delete('/packages/{id}', [Controllers\v1\PackageController::class, 'destroy'])->name('package.destroy');

            // category to package
            Route::put('/package/{package_id}/categories', [Controllers\v1\CategorizableController::class, 'connect'])->name('connect.category.to.package');
            Route::delete('/package/{package_id}/categories', [Controllers\v1\CategorizableController::class, 'disconnect'])->name('disconnect.category.from.package');

            // campaign to package
            Route::put('package/{package_id}/campaigns', [Controllers\v1\CampanileController::class, 'connect'])->name('connect.campaign.to.package');
            Route::delete('package/{package_id}/campaigns', [Controllers\v1\CampanileController::class, 'disconnect'])->name('disconnect.campaign.from.package');

            // tag to package
            Route::put('package/{package_id}/tags', [Controllers\v1\TaggableController::class, 'connect'])->name('connect.tag.to.package');
            Route::delete('package/{package_id}/tags', [Controllers\v1\TaggableController::class, 'disconnect'])->name('disconnect.tag.from.package');

            // answer Type
            Route::get('/answer-types', [Controllers\v1\AnswerTypeController::class, 'index'])->name('answer.type.index');

            // question
            Route::get('/questions', [Controllers\v1\PackageQuestionController::class, 'index'])->name('package.question.index');
            Route::get('/questions/{id}', [Controllers\v1\PackageQuestionController::class, 'show'])->name('package.question.show');
            Route::post('/questions', [Controllers\v1\PackageQuestionController::class, 'store'])->name('package.question.store');
            Route::put('/questions/{id}', [Controllers\v1\PackageQuestionController::class, 'update'])->name('package.question.update');
            Route::delete('/questions/{id}', [Controllers\v1\PackageQuestionController::class, 'destroy'])->name('package.question.destroy');

            // question choice
            Route::get('/question/{id}/choices', [Controllers\v1\PackageQuestionChoiceController::class, 'index'])->name('package.question.choice.index');
            Route::get('/question/choices/{id}', [Controllers\v1\PackageQuestionChoiceController::class, 'show'])->name('package.question.choice.show');
            Route::post('/question/{id}/choices', [Controllers\v1\PackageQuestionChoiceController::class, 'store'])->name('package.question.choice.store');
            Route::post('/question/choices', [Controllers\v1\PackageQuestionChoiceController::class, 'storeBulk'])->name('package.question.choice.store.bulk');
            Route::put('/question/choices/{id}', [Controllers\v1\PackageQuestionChoiceController::class, 'update'])->name('package.question.choice.update');
            Route::delete('/question/choices/{id}', [Controllers\v1\PackageQuestionChoiceController::class, 'destroy'])->name('package.question.choice.destroy');

            // package answer
//            Route::get('/package/{id}/answer', [Controllers\v1\PackageAnswerController::class, 'index'])->name('package.question.choice.index');
//            Route::get('/question/choices/{id}', [Controllers\v1\PackageAnswerController::class, 'show'])->name('package.question.choice.show');
//            Route::post('/question/{id}/choices', [Controllers\v1\PackageAnswerController::class, 'store'])->name('package.question.choice.store');
//            Route::post('/question/choices', [Controllers\v1\PackageAnswerController::class, 'storeBulk'])->name('package.question.choice.store.bulk');
//            Route::put('/question/{id}/choices/{id}', [Controllers\v1\PackageAnswerController::class, 'update'])->name('package.question.choice.update');
//            Route::delete('/question/choices/{id}', [Controllers\v1\PackageAnswerController::class, 'destroy'])->name('package.question.choice.destroy');

            //test
            Route::get('/test', [Controllers\TestController::class, 'test']);

        });
    });
