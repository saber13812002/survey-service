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

        //client-app
        Route::get('/apps', [Controllers\v1\ClientAppController::class, 'index'])->name('client.app.index');
        Route::get('/apps/{id}', [Controllers\v1\ClientAppController::class, 'show'])->name('client.app.show');
        Route::post('/apps', [Controllers\v1\ClientAppController::class, 'store'])->name('client.app.store');
        Route::put('/apps/{id}', [Controllers\v1\ClientAppController::class, 'update'])->name('client.app.update');
        Route::delete('/apps', [Controllers\v1\ClientAppController::class, 'destroy'])->name('client.app.destroy');

        //category
        Route::get('/categories', [Controllers\v1\CategoryController::class, 'index'])->name('category.index');
        Route::get('/categories/{id}', [Controllers\v1\CategoryController::class, 'show'])->name('category.show');
        Route::post('/categories', [Controllers\v1\CategoryController::class, 'store'])->name('category.store');
        Route::put('/categories/{id}', [Controllers\v1\CategoryController::class, 'update'])->name('category.update');
        Route::delete('/categories/{id}', [Controllers\v1\CategoryController::class, 'destroy'])->name('category.destroy');
        Route::patch('/categories/{id}/categorizable', [Controllers\v1\CategorizableController::class, 'updateCategorizableByCategoryId'])->name('update.categorizable.by.categoryId');

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
        Route::get('/packages/types', [Controllers\v1\PackageTypeController::class, 'index'])->name('package.type.index');

        // answer Type
        Route::get('/answers/types', [Controllers\v1\AnswerTypeController::class, 'index'])->name('answer.type.index');

        // package
        Route::get('/packages', [Controllers\v1\PackageController::class, 'index'])->name('package.index');
        Route::get('/packages/templates', [Controllers\v1\PackageController::class, 'byTemplates'])->name('package.index.by.templates');
        Route::get('/packages/{id}', [Controllers\v1\PackageController::class, 'show'])->name('package.show');
        Route::post('/packages', [Controllers\v1\PackageController::class, 'store'])->name('package.store');
        Route::put('/packages/{id}', [Controllers\v1\PackageController::class, 'update'])->name('package.update');
        Route::delete('/packages/{id}', [Controllers\v1\PackageController::class, 'destroy'])->name('package.destroy');

        // category to package
        Route::put('/packages/{packageId}/categories', [Controllers\v1\CategorizableController::class, 'connect'])->name('connect.categories.to.package');
        Route::delete('/packages/{packageId}/categories', [Controllers\v1\CategorizableController::class, 'disconnect'])->name('disconnect.categories.from.package');
//        Route::patch('/packages/{packageId}/categories', [Controllers\v1\CategorizableController::class, 'updateByPackageId'])->name('update.package.categories');

        // campaign to package
        Route::put('packages/{packageId}/campaigns', [Controllers\v1\CampanileController::class, 'connect'])->name('connect.campaigns.to.package');
        Route::delete('packages/{packageId}/campaigns', [Controllers\v1\CampanileController::class, 'disconnect'])->name('disconnect.campaigns.from.package');

        // tag to package
        Route::put('packages/{packageId}/tags', [Controllers\v1\TaggableController::class, 'connect'])->name('connect.tags.to.package');
        Route::delete('packages/{packageId}/tags', [Controllers\v1\TaggableController::class, 'disconnect'])->name('disconnect.tags.from.package');

        // templates to package
        Route::put('/packages/{packageId}/templates', [Controllers\v1\ServiceableController::class, 'store'])->name('templates.store.connect');
        Route::patch('/packages/{packageId}/templates', [Controllers\v1\ServiceableController::class, 'patch'])->name('templates.patch.connect');
        Route::patch('/templates/{templateId}', [Controllers\v1\ServiceableController::class, 'update'])->name('templates.update.connect');
        Route::delete('/templates/{id}', [Controllers\v1\ServiceableController::class, 'destroy'])->name('templates.destroy');

        // package question
        Route::get('/packages/{id}/questions', [Controllers\v1\PackageQuestionController::class, 'getByPackageId'])->name('package.question.index');
        Route::post('/packages/{id}/questions', [Controllers\v1\PackageQuestionController::class, 'store'])->name('package.question.store');
        Route::post('/packages/{id}/questions/bulk', [Controllers\v1\PackageQuestionController::class, 'updateBulk'])->name('package.question.store.bulk');

        // question
        Route::get('/questions/{id}', [Controllers\v1\PackageQuestionController::class, 'show'])->name('package.question.show');
        Route::put('/questions/{id}', [Controllers\v1\PackageQuestionController::class, 'update'])->name('package.question.update');
        Route::delete('/questions/{id}', [Controllers\v1\PackageQuestionController::class, 'destroy'])->name('package.question.destroy');

        // question choice
        Route::get('/questions/{id}/choices', [Controllers\v1\PackageQuestionChoiceController::class, 'index'])->name('package.question.choice.index');
        Route::post('/questions/{id}/choices', [Controllers\v1\PackageQuestionChoiceController::class, 'store'])->name('package.question.choice.store');
        Route::post('/questions/{id}/choices/bulk', [Controllers\v1\PackageQuestionChoiceController::class, 'updateBulk'])->name('package.question.choice.store.bulk');
        // question
        Route::get('/choices/{id}', [Controllers\v1\PackageQuestionChoiceController::class, 'show'])->name('package.question.choice.show');
        Route::put('/choices/{id}', [Controllers\v1\PackageQuestionChoiceController::class, 'update'])->name('package.question.choice.update');
        Route::delete('/choices/{id}', [Controllers\v1\PackageQuestionChoiceController::class, 'destroy'])->name('package.question.choice.destroy');

        // package answer
        Route::get('/packages/{id}/answers', [Controllers\v1\PackageAnswerController::class, 'index'])->name('package.question.answer.index');
        Route::get('/questions/{id}/answers', [Controllers\v1\PackageAnswerController::class, 'getByQuestionId'])->name('package.question.answer.show.by.question.id');
        Route::post('/questions/{id}/answers', [Controllers\v1\PackageAnswerController::class, 'store'])->name('package.question.answer.store');
//            Route::post('/packages/{id}/answers/bulk', [Controllers\v1\PackageAnswerController::class, 'storeUpdateBulk'])->name('package.question.answer.store.update.bulk');
        Route::post('/users/{user_id}/packages/{id}/answers/bulk', [Controllers\v1\PackageAnswerController::class, 'userStoreUpdateBulk'])->name('user.package.question.answer.store.update.bulk');
        Route::put('/questions/{id}/answers', [Controllers\v1\PackageAnswerController::class, 'update'])->name('package.question.answer.update');
        // answer
        Route::get('/answers/{id}', [Controllers\v1\PackageAnswerController::class, 'show'])->name('package.question.answer.show');
        Route::delete('/answers/{id}', [Controllers\v1\PackageAnswerController::class, 'destroy'])->name('package.question.answer.destroy');

        // reports
        Route::get('/packages/{id}/reports', [Controllers\v1\ReportController::class, 'byPackageId'])->name('report.by.package.id');
        Route::get('/packages/{id}/participants', [Controllers\v1\ReportController::class, 'participantsByPackageId'])->name('report.participants.by.package.id');
        Route::get('/packages/{package_id}/participants/{user_id}', [Controllers\v1\PackageAnswerController::class, 'answersByPackageIdByUserId'])->name('report.participants.answers.by.package.id');
        Route::get('/participants/{id}/packages', [Controllers\v1\ParticipantController::class, 'packagesByParticipantId'])->name('report.packages.by.participant.id');


        //test
        Route::get('/test', [Controllers\TestController::class, 'test']);

    });
